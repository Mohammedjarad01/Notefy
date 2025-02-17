<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Tag;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * عرض قائمة الملاحظات
     */
    public function index()
    {
        $notes = Note::all();
        return view("note.index", ["notes" => $notes]);
    }

    /**
     * عرض نموذج إضافة ملاحظة جديدة
     */
    public function create()
    {
        return view("note.create");
    }

    /**
     * عرض ملاحظة معينة
     */
    public function show(Note $note)
    {
        return view("note.show", ['note' => $note]);
    }

    /**
     * عرض نموذج تعديل الملاحظة
     */
    public function edit(Note $note)
    {
        return view("note.edit", ['note' => $note]);
    }

    /**
     * تخزين ملاحظة جديدة مع الوسوم
     */
    public function store(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $data = $request->validate([
            'title' => 'required|string|max:100',
            'note' => 'required|string',
            'color' => 'required|string|max:7',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpg,png,gif,jpeg,svg|max:1024',
            'tags' => 'nullable|string' // الوسوم
        ]);

        // حفظ الصور إن وجدت
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '-' . $image->getClientOriginalName();
                $image->storeAs('public/uploads', $imageName);
                $images[] = $imageName;
            }
        }

        // تعيين لون افتراضي في حالة عدم تحديد لون
        $data['color'] = $request->input('color', '#ffcc00');
        $data['images'] = json_encode($images);

        // إنشاء الملاحظة
        $note = Note::create($data);

        // حفظ الوسوم إن وجدت
        if ($request->tags) {
            $tagNames = explode(',', $request->tags);
            $tagIds = [];

            foreach ($tagNames as $tagName) {
                $tag = Tag::firstOrCreate(['name' => trim($tagName)]);
                $tagIds[] = $tag->id;
            }

            $note->tags()->sync($tagIds);
        }

        return redirect()->route('note.show', $note);
    }

    /**
     * تحديث ملاحظة موجودة مع الوسوم
     */
    public function update(Request $request, Note $note)
    {
        // التحقق من صحة البيانات
        $data = $request->validate([
            'title' => 'required|string|max:100',
            'note' => 'required|string',
            'color' => 'required|string|max:7',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpg,png,gif,jpeg,svg|max:1024',
            'tags' => 'nullable|string' // الوسوم
        ]);

        // تحديث الصور إن وجدت
        $images = json_decode($note->images, true) ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '-' . $image->getClientOriginalName();
                $image->storeAs('public/uploads', $imageName);
                $images[] = $imageName;
            }
        }

        // تحديث البيانات
        $note->update([
            'title' => $data['title'],
            'note' => $data['note'],
            'color' => $data['color'],
            'images' => json_encode($images),
        ]);

        // تحديث الوسوم
        if ($request->tags) {
            $tagNames = explode(',', $request->tags);
            $tagIds = [];

            foreach ($tagNames as $tagName) {
                $tag = Tag::firstOrCreate(['name' => trim($tagName)]);
                $tagIds[] = $tag->id;
            }

            $note->tags()->sync($tagIds);
        } else {
            $note->tags()->detach(); // إزالة الوسوم إن لم يتم إرسالها
        }

        return redirect()->route('note.show', ['note' => $note]);
    }

    /**
     * حذف ملاحظة
     */
    public function destroy(Note $note)
    {
        $note->tags()->detach(); // إزالة الوسوم المرتبطة
        $note->delete();
        return redirect()->route('note.index');
    }

    /**
     * البحث عن الملاحظات باستخدام الوسوم
     */
    public function searchByTag(Request $request)
    {
        $tagName = $request->input('tag');
        $tag = Tag::where('name', $tagName)->first();

        if (!$tag) {
            return redirect()->route('note.index')->with('error', 'لم يتم العثور على أي ملاحظات بهذا الوسم');
        }

        $notes = $tag->notes;

        return view('note.index', compact('notes'));
    }
}
