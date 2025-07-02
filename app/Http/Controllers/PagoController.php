<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\Client\Common\RequestOptions;
use MercadoPago\Exceptions\MPApiException;
use Illuminate\Support\Facades\Auth;

class PagoController extends Controller
{

  public function crearPago(Request $request) {
      MercadoPagoConfig::setAccessToken("TEST-6055790255345837-052118-0919f002bb14fe1a4735989221e6a2fe-294560798");

      $client = new PaymentClient();
      $request_options = new RequestOptions();
      $key = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
      $request_options->setCustomHeaders(["X-Idempotency-Key: " . $key]);

      try {
        $payment = $client->create([
          "token" => $request->input('token'),
          "issuer_id" => $request->input('issuer_id'),
          "payment_method_id" => $request->input('payment_method_id'),
          "transaction_amount" => floatval($request->input('transaction_amount')),
          "installments" => $request->input('installments'),
          "payer" => [
            "email" => $request->input('payer.email'),
            "identification" => [
              "type" => $request->input('payer.identification.type'),
              "number" => $request->input('payer.identification.type')
            ]
          ]
        ], $request_options);

        $usuario = Auth::user();
        $usuario->es_miembro = true;
        $usuario->subscribed_at = date('Y-m-d, H:i:s');
        $usuario->save();

        return response()->json($payment);
      } catch (MPApiException $e) {
        return response()->json([
          'status' => 'error',
          'status_code' => $e->getApiResponse()->getStatusCode(),
          'body' => $e->getApiResponse()->getContent(), // <-- acá están los detalles
      ]);
      }
    }

    public function desuscribirse(Request $request) {
        $usuario = Auth::user();
        $usuario->es_miembro = false;
        $usuario->save();

        return redirect()
            ->route('membresia')
            ->with('message.success', 'Desuscripción exitosa.');
    }
}