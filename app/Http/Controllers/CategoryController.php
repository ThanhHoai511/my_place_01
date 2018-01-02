<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $categoryRepository;
    
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->paginate();
        $pluckCategory = $this->categoryRepository->showParent();
        $pluckCategory[''] = 'None';
        $pluckConcept = $this->categoryRepository->showConcept();
        $pluckConcept[''] = 'None';

        return view('backend.category.category-list', compact('categories', 'pluckCategory', 'pluckConcept'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $input = $request->only('name', 'parent_id', 'type_concept');
            $this->categoryRepository->create($input);

            return redirect()->action('CategoryController@index')
            ->with('status', trans('messages.successfull'));
        } catch (Exception $e) {
            Log::debug($e);

            return back()->withErrors(trans('messages.updatefail'));
        }

        return redirect()->action('CategoryController@index')
            ->with('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->categoryRepository->find($id);
        $pluckCategory = $this->categoryRepository->showParent();
        $pluckCategory[''] = 'None';
        $pluckConcept = $this->categoryRepository->showConcept();
        $pluckConcept[''] = 'None';
        
        return view('backend.category.category-edit', compact('categories', 'pluckCategory', 'pluckConcept'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = $this->categoryRepository->find($id);
        try {
            $input = $request->only('name', 'parent_id', 'type_concept');
            $result = $this->categoryRepository->update($input, $id);

            return redirect()->action('CategoryController@index')
            ->with('status', trans('messages.successfull'));
        } catch (Exception $e) {
            Log::error($e);

            return back()->withErrors(trans('messages.updatefail'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = $this->categoryRepository->find($id);
        if (!$categories) {
            return view('errors.404');
        }
        try {
            $this->categoryRepository->delete($id);

            return redirect()->action('CategoryController@index')
                ->with('status', trans('messages.deletesuccessfully'));
        } catch (Exception $e) {
            Log::error($e);

            return redirect()->action('CategoryController@index')
            ->withErrors(trans('messages.deletefailed'));
        }
    }
}
