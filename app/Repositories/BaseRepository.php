<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use Illuminate\Support\Facades\Storage;

abstract class BaseRepository implements RepositoryInterface{
    protected $model;

    public function __construct(){
        $this->setModel();
    }

    public function setModel(){
        $this->model = app()->make($this->getModel());
    }

    abstract public function getModel();

    public function index(){
        return $this->model->orderBy('created_at','desc')->paginate(2);
    }

    public function getAll(){
        return $this->model->orderBy('created_at','desc')->get();
    }

    public function find($id){
        return $this->model->find($id);
    }

    public function create($attributes=[]){
        return $this->model->create($attributes);
    }

    public function update($id,$attributes=[]) {
        $result = $this->model->find($id);
        if($result){
            if(!empty($result->image)){
                if (!empty($attribute['image'])) {
                    Storage::delete('public/images/' . $result->image);
                }
            }
            return $result->update($attributes);
        }

        return false;
    }

    public function delete($id){
        $result = $this->model->find($id);

        if($result){
            if($result->image){
                Storage::delete('public/images/' . $result->image);
            }
            return $result->delete();
        }
        return false;
    }
}