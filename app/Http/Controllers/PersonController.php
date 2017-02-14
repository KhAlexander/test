<?php

namespace App\Http\Controllers;

use App\DataTables\PersonsDataTable;
use App\Http\Requests\PersonRequest;
use App\Models\Person;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PersonsDataTable $dataTable)
    {
        return $dataTable->render('person.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('person.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonRequest $request)
    {
        Person::create($request->all());

        return redirect(route('person.index'))->with('alert-success', 'db.create_success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $person = Person::findorFail($id);

        return view('person.edit', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersonRequest $request, $id)
    {
        Person::findorFail($id)->update($request->all());

        return redirect(route('person.index'))->with('alert-success', 'db.update_success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Person::findorFail($id)->delete();

        return redirect(route('person.index'))->with('alert-success', 'db.delete_success');
    }
}
