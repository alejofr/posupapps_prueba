<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Publication;

class PublicationController extends Controller{

    public function __construct() {
        if ( !$this->checkAuth() ){
            $this->redirect('/');
        }
    }

    public function index(){

        $page = $this->only('page') != null ? $this->only('page') : 1;
        $limit = 15;

        $records = Publication::select(['*']);

        $count = $records->count();
        $records->limit($limit)
        ->skip($limit * ($page - 1));

        $results = $records->get()->toArray();

        return $this->view('publications.home', [
            'data' => $results,
            'pagination' => [
                'last_page' => ceil($count / $limit),
                'page' => $page
            ]
        ]);
    }

    public function create(){
        return $this->view('publications.form', [
            'edit' => false
        ]);
    }

    public function store()
    {   
        $data = $this->all('POST');

        $publication = Publication::create($data);

        return $this->view('publications.form', [
            'edit' => false,
            'created' => 'Publicacion creada',
            ...$this->getObjArray($publication)
        ]);
    }

    public function edit($id)
    {  
        $publication = Publication::find($id);

        if ( $publication == null ){
            return $this->redirect('/publications');
        }

        return $this->view('publications.form', [
            'edit' => true,
            ...$this->getObjArray($publication)
        ]);
    }

    public function update($id)
    { 
        $publication = Publication::find($id);
        $data = $this->all('POST');

        if ( $publication == null ){
            return $this->redirect('/publications');
        }

        $publication->update($data);

        return $this->view('publications.form', [
            'edit' => true,
            'created' => 'Publicacion actualizada',
            ...$this->getObjArray($publication)
        ]);
    }

    public function destroy($id)
    {  
        $publication = Publication::find($id);

        if ( $publication !== null ){
            $publication->delete();
        }

        return $this->redirect('/publications');
    }

    public function getObjArray(Publication $publication)
    { 
        return [
            'id' => $publication->id,
            'titulo' => $publication->titulo,
            'contenido' => $publication->contenido,
            'autor' => $publication->autor,
            'fecha_publicacion' => $publication->fecha_publicacion
        ];

    }

}