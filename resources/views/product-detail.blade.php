<!DOCTYPE html>
<html lang="en">

@include("utility.head")

<body>
    @include("utility.navbar")

    <div class="container">

        <!-- MESSAGE -->
        @if (session("message"))
        <div class="modal fade" id="message" tabindex="-1" aria-labelledby="messageLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="bg-light modal-header">
                        <h1 class=" modal-title fs-5" id="messageLabel">Message</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ session("message") }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            let message = new bootstrap.Modal(document.getElementById('message'), {});
            message.show();
        </script>
        @endif
        <!-- MESSAGE -->

        <div class="card shadow p-4 my-4">

            <form action="/update-product" method="post">
                @csrf
                <div class="mb-2">
                    <h4>Product Detail</h4>
                    <p>Toko Pelopor Sistem Belanja Online</p>
                </div>

                <!-- ID -->
                <div class="mb-3">
                    <label for="id" class="form-label fw-bold">Id</label>
                    <input readonly type="text" class="form-control" name="id" id="id" value="{{ $product->id }}">
                </div>

                <!-- NAME -->
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}">
                </div>

                <!-- QTY -->
                <div class="mb-3">
                    <label for="qty" class="form-label fw-bold">Qty</label>
                    <div class="row">
                        <div class="col">
                            <input min="0" type="number" class="form-control" name="qty" id="qty" value="{{ $product->qty }}">
                        </div>
                        <div class="col">
                            <input min="1" type="number" class="form-control" name="quantity_change" id="quantity_change" placeholder="Quantity Change">
                        </div>
                        <div class="col">
                            <button type="button" class="btn w-100 btn-warning button_quantity">
                                Minus
                            </button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn w-100 btn-success button_quantity">
                                Plus
                            </button>
                        </div>
                    </div>
                </div>

                <!-- BUTTON UPDATE -->
                <div>
                    <button type="submit" class="mt-2 btn btn-primary">
                        <svg class="me-1 mb-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                            <path d="M11 2H9v3h2V2Z" />
                            <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0ZM1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5Zm3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4v4.5ZM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5V15Z" />
                        </svg>
                        Update
                    </button>
                </div>
                <!-- BUTTON UPDATE -->

            </form>
        </div>
    </div>

    <script>
        let qty = document.getElementById('qty');
        let button_quantitys = document.getElementsByClassName("button_quantity");
        let quantity_change = document.getElementById("quantity_change");
        let minus = button_quantitys[0];
        let plus = button_quantitys[1];

        function quantityChange() {
            alert("Enter a valid number!");
            quantity_change.focus();
        }

        plus.onclick = () => {
            if (!isNaN(quantity_change.value) && quantity_change.value >= 1) {
                qty.value = Number(qty.value) + Number(quantity_change.value);
            } else {
                quantityChange();
            }
        }

        minus.onclick = () => {
            if (!isNaN(quantity_change.value) && quantity_change.value >= 1) {

                if ((Number(qty.value) - Number(quantity_change.value)) < 0) {
                    qty.value = 0;
                } else {
                    qty.value = Number(qty.value) - Number(quantity_change.value);
                }
            } else {
                quantityChange();
            }
        }
    </script>
</body>

</html>