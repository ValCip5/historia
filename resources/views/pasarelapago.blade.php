@extends('layouts.main')
@section('body')

<script src="https://sdk.mercadopago.com/js/v2"></script>
<section class="container pt-5">
  <div class="pt-5" id="paymentBrick_container">
  </div>
  <script>
  const mp = new MercadoPago('TEST-0eb6ada1-8fe5-4607-bd07-bf1c80ebc259', {
    locale: 'es'
  });
  const bricksBuilder = mp.bricks();
    const renderPaymentBrick = async (bricksBuilder) => {
      const settings = {
        initialization: {
          /*
            "amount" es el monto total a pagar por todos los medios de pago con excepción de la Cuenta de Mercado Pago y Cuotas sin tarjeta de crédito, las cuales tienen su valor de procesamiento determinado en el backend a través del "preferenceId"
          */
          amount: 15000,
          // preferenceId: "<PREFERENCE_ID>",
          payer: {
            firstName: "",
            lastName: "",
            email: "",
          },
        },
        customization: {
          visual: {
            style: {
              theme: "default",
            },
          },
          paymentMethods: {
            creditCard: "all",
            bankTransfer: "all",
            atm: "all",
            debitCard: "all",
            maxInstallments: 1
          },
        },
        callbacks: {
          onReady: () => {
            /*
             Callback llamado cuando el Brick está listo.
             Aquí puede ocultar cargamentos de su sitio, por ejemplo.
            */
          },
          onSubmit: ({ selectedPaymentMethod, formData }) => {
            // callback llamado al hacer clic en el botón de envío de datos
            console.log(formData)
            return new Promise((resolve, reject) => {
              fetch("/api/pago", {
                method: "POST",
                headers: {
                  "Content-Type": "application/json",
                },
                body: JSON.stringify(formData),
              })
                .then((response) => response.json())
                .then((response) => {
                  // recibir el resultado del pago
                  resolve();
                })
                .catch((error) => {
                  // manejar la respuesta de error al intentar crear el pago
                  reject();
                });
            }).then (() => {
              window.location.href = "/membresia";
            });
          },
          onError: (error) => {
            // callback llamado para todos los casos de error de Brick
            console.error(error);
          },
        },
      };
      window.paymentBrickController = await bricksBuilder.create(
        "payment",
        "paymentBrick_container",
        settings
      );
    };
    renderPaymentBrick(bricksBuilder);
  </script>

@endsection