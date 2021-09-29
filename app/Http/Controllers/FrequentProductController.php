<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FrequentProduct;

class FrequentProductController extends Controller
{
  /**
   * Validar datos de producto frequente.
   * @return void.
  */
  private function validate($data)
    {
      $this->validate($data, [
        'user.password_confirm' => 'string|required',
      ]);
    }

  /**
   * Crear producto frequente.
   * @return JSON.
   */
  public function create(Request $request)
  {
    try {
      $this->validate($request);
      $product = Product::createNew($request);
      $frequent_product = FrequentProduct::createNew($request, $product->product_id);
      UserData::createNew($user->user_id, $request->responsable);
      $message = ['status' => 'success', 'message' => 'Guardaste el producto en tus productos frecuentes'];
    }
    catch (\Exception $e)
    {
      $message = ['status' => 'warning', 'message' => 'No ingreses información inválida.'];
    }
    return response()->json($message, 200);
  }

  /**
   * Crear producto frequente.
   * @return JSON.
   */
  public function update(Request $request)
  {
    
  }

  /**
   * Crear producto frequente.
   * @return JSON.
   */
  public function delete(Request $request)
  {
    
  }
}
