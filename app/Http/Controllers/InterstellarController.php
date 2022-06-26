<?php
namespace Sohagpro\Interstellar\Http\Controllers;

use App\Http\Controllers\Controller;

class InterstellarController extends Controller {
    public function index() {
        return view( 'interstellar::index' );
    }
}