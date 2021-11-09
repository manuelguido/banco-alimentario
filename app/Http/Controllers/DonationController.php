<?php

namespace App\Http\Controllers;

use Egulias\EmailValidator\Exception\DotAtEnd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Donation;
use App\Product;
use App\Item;
use User;
use DB;

class DonationController extends Controller
{
    /**
     * Validar item de donación
     * @return void.
     */
    private function validateDonationItem($data)
    {
        $this->validate($data, [
            'product' => 'string|required',
            'amount' => 'numeric|required',
            'category_id' => 'numeric|required',
            'unit_of_measurement_id' => 'numeric|required',
            'is_refrigerable' => 'boolean|required',
            'exp_date' => 'date|string|nullable|object',
        ]);
    }

    /**
     * Validar item id de item de donación
     * @return void.
     */
    private function validateItemId($data)
    {
        $this->validate($data, [
            'item_id' => 'numeric|required|min:0',
        ]);
    }

    /**
     * Elementos de dataset para visualización de datos.
     * @return Array.
     */
    private function getDonationTableColumns() {
        return [
            [
                'label' => 'asd',
                'field' => 'id',
                'sort' => false,
                'id' => true,
                'mobile' => false,
            ],
            [
                'label' => 'Fecha',
                'field' => 'name',
                'sort' => 'asc',
                'mobile' => true,
            ],
            [
                'label' => 'Cantidad de productos',
                'field' => 'email',
                'sort' => 'asc',
                'mobile' => false,
            ],
        ];
    }

    /**
     * Busqueda de datos para tablas.
     * @return Collection.
     */
    private function getDonationTableRows($user_id)
    {
        $donations = Donation::where([
            ['users.user_id', '=', $user_id],
            ['donation_states.state', '=', $user_id]
            ])
            ->join('givers', 'givers.giver_id', '=', 'donations.giver_id')    
            ->join('givers', 'givers.giver_id', '=', 'donations.giver_id')
            ->join('users', 'users.user_id', '=', 'givers.user_id')
            ->select('donation.*')
            ->get();
        return $donation->sortByDesc('finished_at')->values()->all();
    }

    /**
     * Donaciones terminadas de un donante.
     * @return JSON.
     */
    public function giverFinished() {
        $responseData = [
            'rows' => $this->getDonationTableColumns(),
            'columns' => []
        ];
        return response()->json($responseData);
    }

    /**
     * Donaciones terminadas de un donante.
     * @return JSON.
     */
    public function create() {
        $this->validateDonation();
        return response()->json($responseData);
    }

    /**
     * Actualizar datos de una donación aún por aceptar.
     * @return JSON.
     */
    public function update() {
        $this->validateDonation();
        return response()->json($responseData);
    }

    /**
     * Cancelar donación.
     * @return JSON.
     */
    public function cancel() {
        return response()->json($responseData);
    }

    /**
     * Añadir item a donación vigente.
     * @return JSON.
     */
    public function addItem(Request $request)
    {
        try {
            $this->validateDonationItem($request);
            $product = Product::createProduct($request);
            $donation = $request->user()->giver()->first()->currentDonation();
            if (!$donation) {
                $donation = Donation::createCurrentDonation($request->user()->user_id);
            }
            $item = Item::createItem($request, $product->product_id, $donation->donation_id);
            $message = ['status' => 'success', 'message' => 'Item agregado.'];
        } catch (\Throwable $th) {
            $message = ['status' => 'warning', 'message' => 'No ingreses valores no válidos.'];
        }

        return response()->json($message);
    }

    /**
     * Eliminar item de donación vigente.
     * @return JSON.
     */
    public function deleteItem(Request $request)
    {
        try {
            $this->validateItemId($request);
            $item = Item::find($request->item_id);
            $product = $item->product();
            $item->delete();
            $product->delete();
            $message = ['status' => 'success', 'message' => 'Item eliminado.'];
        } catch (\Throwable $th) {
            $message = ['status' => 'warning', 'message' => 'No ingreses valores no válidos.'];
        }
        return response()->json($message);
    }

    /**
     * Obtener items de una donación vigente
     * @return JSON.
     */
    public function currentItems(Request $request)
    {
        $currentDonation = $request->user()->giver()->first()->currentDonation();
        $responseData = $currentDonation
            ? $currentDonation->itemsComplete()
            : [];
        return response()->json($responseData);
    }

    /**
     * Obtener items de una donación vigente en dataset
     * @return JSON.
     */
    public function currentItemsDataset(Request $request)
    {
        $currentDonation = $request->user()->giver()->first()->currentDonation();
        $items = $currentDonation
            ? $currentDonation->itemsComplete()
            : [];

        return response()->json([
            'columns' => $this->getDonationTableColumns(),
            'rows' => $items,
        ]);
    }
}
