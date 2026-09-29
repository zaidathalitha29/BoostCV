<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Portfolio;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the creator's portfolios.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creator = Auth::user()->creator;

        $portfolios = Portfolio::where('creator_id', $creator->id)->get();

        return view('portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new portfolio.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('portfolio.create');
    }

    /**
     * Store a newly created portfolio.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        $creator = Auth::user()->creator;

        $image = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image')
                ->store('portfolio_images', 'public');
        }

        Portfolio::create([
            'creator_id' => $creator->id,
            'title' => $request->title,
            'image' => $image,
        ]);

        return redirect()
            ->route('creator.portfolios.index')
            ->with('success', 'Portfolio berhasil ditambahkan.');
    }

    /**
     * Display the specified portfolio.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $creator = Auth::user()->creator;

        $portfolio = Portfolio::where('creator_id', $creator->id)
            ->findOrFail($id);

        return view('portfolio.show', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified portfolio.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $creator = Auth::user()->creator;

        $portfolio = Portfolio::where('creator_id', $creator->id)
            ->findOrFail($id);

        return view('portfolio.edit', compact('portfolio'));
    }

    /**
     * Update the specified portfolio.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        $creator = Auth::user()->creator;

        $portfolio = Portfolio::where('creator_id', $creator->id)
            ->findOrFail($id);

        $data = [
            'title' => $request->title,
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('portfolio_images', 'public');
        }

        $portfolio->update($data);

        return redirect()
            ->route('creator.portfolios.index')
            ->with('success', 'Portfolio berhasil diperbarui.');
    }

    /**
     * Remove the specified portfolio.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $creator = Auth::user()->creator;

        $portfolio = Portfolio::where('creator_id', $creator->id)
            ->findOrFail($id);

        $portfolio->delete();

        return redirect()
            ->route('creator.portfolios.index')
            ->with('success', 'Portfolio berhasil dihapus.');
    }
}