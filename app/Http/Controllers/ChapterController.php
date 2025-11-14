<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function index(Request $request)
    {
        $isHtmx = $request->hasHeader('HX-Request');

        $chapters = Chapter::orderBy('order')->get();

        if ($isHtmx) {
            return view('outline.chapters.fragments.chapter-list', compact('chapters', 'isHtmx'));
        }

        return view('outline.chapters.index', compact('chapters', 'isHtmx'));
    }

    public function show(Request $request, Chapter $chapter)
    {
        $isHtmx = $request->hasHeader('HX-Request');

        if ($isHtmx) {
            return view('outline.chapters.fragments.chapter-details', compact('chapter', 'isHtmx'));
        }

        return view('outline.chapters.show', compact('chapter', 'isHtmx'));
    }

    public function create(Request $request)
    {
        $isHtmx = $request->hasHeader('HX-Request');

        if ($isHtmx) {
            return view('outline.chapters.fragments.create-chapter-form', compact('isHtmx'));
        }

        return view('outline.chapters.create', compact('isHtmx'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $nextOrder = (Chapter::max('order') ?? 0) + 1;
        $data['order'] = $nextOrder;

        $chapter = Chapter::create($data);

        $isHtmx = $request->hasHeader('HX-Request');

        if ($isHtmx) {
            $chapters = Chapter::orderBy('order')->get();

            $chapterListHtml = view('outline.chapters.fragments.chapter-list', compact('chapters', 'isHtmx'))->render();
            $modalHtml = view('outline.fragments.modal', compact('isHtmx'))->render();

            return response($chapterListHtml . $modalHtml);
        }

        return redirect()->route('outline.chapters.show', $chapter);
    }

    public function edit(Chapter $chapter)
    {
        return view('outline.chapters.edit', compact('chapter'));
    }

    public function update(Request $request, Chapter $chapter)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'order' => 'nullable|integer',
        ]);

        $chapter->update($data);

        return redirect()->route('outline.chapters.show', $chapter);
    }

    public function destroy(Request $request, Chapter $chapter)
    {
        $deletedOrder = $chapter->order;

        $chapter->delete();

        Chapter::where('order', '>', $deletedOrder)->decrement('order');

        $isHtmx = $request->hasHeader('HX-Request');

        if ($isHtmx) {
            $chapters = Chapter::orderBy('order')->get();

            $chapterListHtml = view('outline.chapters.fragments.chapter-list', compact('chapters', 'isHtmx'))->render();
            $modalHtml = view('outline.fragments.modal', compact('isHtmx'))->render();

            return response($chapterListHtml . $modalHtml);
        }

        return redirect()->route('outline.chapters.index');
    }
}
