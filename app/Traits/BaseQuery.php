<?php
namespace App\Traits;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
trait BaseQuery{

    public function add($model, $data)
    {
        return $model->create($data);
    }

    public function get_by_id($model, $id)
    {
        return $model->findOrFail($id);
    }

}




?>
