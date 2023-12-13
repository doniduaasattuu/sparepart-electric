<!DOCTYPE html>
<html lang="en">

@include("utility.head")

<body>
    @include("utility.navbar")

    <div class="container">

        @include('utility.message')

        <div class="card shadow p-4 my-4">

            <form action="/registry-product" method="post">
                @csrf
                <div class="mb-2">
                    <h4>Registry Product</h4>
                    <p>Toko Pelopor Sistem Belanja Online</p>
                </div>

                <!-- ID -->
                <div class="mb-3">
                    <label for="id" class="form-label fw-bold">Id *</label>
                    <input type="number" class="form-control" name="id" id="id">
                </div>

                <!-- NAME -->
                <div class=" mb-3">
                    <label for="name" class="form-label fw-bold">Name *</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>

                <!-- PRICE -->
                <div class=" mb-3">
                    <label for="price" class="form-label fw-bold">@Price *</label>
                    <input type="text" class="form-control" name="price" id="price">
                </div>

                <!-- QTY -->
                <div class=" mb-3">
                    <label for="qty" class="form-label fw-bold">Qty *</label>
                    <input type="number" class="form-control" name="qty" id="qty">
                </div>

                <!-- BUTTON UPDATE -->
                <div>
                    <button type=" submit" class="mt-2 btn btn-primary">
                        <svg class="me-1 mb-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                            <path d="M11 2H9v3h2V2Z" />
                            <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0ZM1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5Zm3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4v4.5ZM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5V15Z" />
                        </svg>
                        Submit
                    </button>
                </div>
                <!-- BUTTON UPDATE -->

            </form>
        </div>
    </div>
</body>

</html>