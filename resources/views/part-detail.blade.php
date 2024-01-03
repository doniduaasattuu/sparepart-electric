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

            <form id="myForm" action="/upsert-part" enctype="multipart/form-data" method="post">
                @csrf
                <div class="mb-4">
                    <h4 class="mb-1" id="title">{{ $title }}</h4>
                    @if (empty($part))
                    <div class="form-text">Fields marked with * are mandatory.</div>
                    @endif
                </div>

                @foreach ($columns as $column)

                @if ($column == 'material_type')
                <div class="mb-3">
                    <label for="{{ $column }}" class="form-label fw-bold">{{ ucwords(implode(" ", explode("_", $column))) }}</label>
                    <select class="form-select" name="{{ $column }}" id="{{ $column }}" aria-label="Material Type">
                        @php
                        $count = 0
                        @endphp

                        @foreach ($types as $type)

                        <!-- MATERIAL TYPE -->
                        @if(!empty($part))
                        @if ($type == $part[$column])
                        <option selected value="{{ $type }}">{{ $selects[$count] }}</option>
                        @else
                        <option value="{{ $type }}">{{ $selects[$count] }}</option>
                        @endif
                        @else
                        <option value="{{ $type }}">{{ $selects[$count] }}</option>
                        @endif

                        @php
                        $count++
                        @endphp

                        @endforeach
                    </select>
                </div>
                @continue

                @elseif ($column == 'id')
                <div class="mb-3">
                    <label for="{{ $column }}" class="form-label fw-bold">Material Number</label>
                    @if (!empty($part))
                    <input readonly onkeypress="return /[0-9-.]/i.test(event.key)" type="text" class="form-control" name="{{ $column }}" id="{{ $column }}" value="{{ $part[$column] }}">
                    @else
                    <input type="text" onkeypress="return /[0-9-.]/i.test(event.key)" class="form-control" name="{{ $column }}" id="{{ $column }}">
                    @endif
                </div>
                @continue

                @elseif ($column == 'qty')
                <div class="mb-3">
                    <label for="{{ $column }}" class="form-label fw-bold">{{ ucwords(implode(" ", explode("_", $column))) }}</label>
                    @if (!empty($part))
                    <input type="number" onkeypress="return /[0-9-.]/i.test(event.key)" step="1" min="0" max="255" class="form-control" name="{{ $column }}" id="{{ $column }}" value="{{ $part[$column] }}">
                    @else
                    <input type="number" onkeypress="return /[0-9-.]/i.test(event.key)" step="1" min="0" max="255" class="form-control" name="{{ $column }}" id="{{ $column }}" value="0">
                    @endif
                </div>
                @continue

                @else
                <div class="mb-3">
                    <label for="{{ $column }}" class="form-label fw-bold">{{ ucwords(implode(" ", explode("_", $column))) }}</label>
                    @if (!empty($part))
                    <input type="text" class="form-control" name="{{ $column }}" id="{{ $column }}" value="{{ $part[$column] }}">
                    @else
                    <input type="text" class="form-control" name="{{ $column }}" id="{{ $column }}">
                    @endif
                </div>
                @endif

                @endforeach

                <!-- IMAGE FILE -->
                <div class="mb-3">
                    <label for="image" class="form-label fw-bold">Image</label>
                    @if (!empty($part))
                    <div class="input-group">
                        <input title="Current image will be replaced!" type="file" class="form-control" id="image" name="image">
                        <button class="btn btn-success" type="button" id="inputGroupFileAddon04">
                            <a style="text-decoration: none; color: white;" href="/storage/images/{{ $part['id'] }}.jpg">
                                Current Image
                            </a>
                        </button>
                    </div>
                    <div class="form-text" id="basic-addon4">The current image (if any) will be replaced.</div>
                </div>

                @else
                <input type="file" class="form-control" id="image" name="image">
                @endif
        </div>
        <!-- IMAGE FILE -->

        <!-- BUTTON UPDATE -->
        <div>
            <button id="myButton" type="submit" class="mt-2 btn btn-primary">
                <svg class="me-1 mb-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                    <path d="M11 2H9v3h2V2Z" />
                    <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0ZM1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5Zm3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4v4.5ZM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5V15Z" />
                </svg>
                <span id="buttonText">Update</span>
            </button>
        </div>
        <!-- BUTTON UPDATE -->

        </form>
    </div>
    </div>

    <script>
        let id = document.getElementById('id');
        let buttonText = document.getElementById('buttonText');
        let form_labels = document.getElementsByClassName('form-label');
        let material_description = document.getElementById('material_description');
        let material_location = document.getElementById('location');
        let myButton = document.getElementById('myButton');
        let myForm = document.getElementById('myForm');

        material_description.oninput = () => {
            material_description.value = material_description.value.toUpperCase();
        }

        material_location.oninput = () => {
            material_location.value = material_location.value.toUpperCase();
        }

        if (document.getElementById('title').textContent == 'Registry Material') {

            buttonText.textContent = 'Submit';

            for (let i = 0; i < form_labels.length - 2; i++) {
                form_labels[i].textContent = form_labels[i].textContent + " *";
                form_labels[i].setAttribute('title', 'This field is required!');
            }

            id.onchange = () => {
                if (id.value.length != 8) {
                    alert("Material Number is Invalid!");
                } else {
                    let ajax = new XMLHttpRequest();
                    ajax.open('GET', '/id-check/' + id.value)
                    ajax.onload = () => {
                        if (ajax.readyState == 4) {
                            let response = ajax.responseText
                            if (response) {
                                alert(response);
                                let value = id.value;
                                id.value = '';
                                id.focus();
                                window.open(`/part-detail/${value}`, '_blank');
                            }
                        }
                    }
                    ajax.send()
                }
            }
        }
    </script>
</body>

</html>