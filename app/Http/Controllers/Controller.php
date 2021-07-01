<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Exception;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function callProcedure($query)
	{
		try {
			\DB::statement($query);

			return back()->with('success', "Berhasil submit data");
		} catch (Exception $e) {
			return back()->with('error', "Gagal submit data");
		}
	}
}
