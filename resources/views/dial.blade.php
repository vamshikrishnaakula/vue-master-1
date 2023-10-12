<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone Dial Pad</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <style>
        .dial-pad {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            width: 300px;
            margin: 0 auto;
            border-radius: 70px;
        }

        .button {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            background-color: #007bff;
            color: white;
            font-size: 20px;
            cursor: pointer;
        }

        .red-button {
            background-color: #f44336;
        }

        #phoneNumber {
            width: 100%;
            padding: 10px;
            font-size: 18px;
        }

        .number-pad {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 9px;
            max-width: 216px;
            /* Adjusted max-width */
            margin: 0 auto;
        }

        .number-button {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 65px;
            height: 68px;
            font-size: 16px;
            background-color: #0a0a0a;
            color: white;
            cursor: pointer;
            border-radius: 16px;
        }

        .button {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;

            color: white;
            font-size: 20px;
            cursor: pointer;
            border-radius: 50%;
        }

        .round-button svg {
            width: 50%;
            height: 50%;
        }

        .circle {
            width: 50px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .circle svg {
            width: 70%;
            height: 70%;
        }

        .hidden-button {
            display: none;
        }
    </style>
</head>

<body>
    <form id="callForm">
        @csrf
        <input type="text" id="phoneNumber" style="width:16%;margin-left: 566px; margin-top: 30px"
            placeholder="Dial a number" readonly>

        <div class="number-pad" style="margin-top: 100px;">
            <div class="number-button" onclick="addToNumber('1')">1</div>
            <div class="number-button" onclick="addToNumber('2')">2<br>ABC</div>
            <div class="number-button" onclick="addToNumber('3')">3<br>DEF</div>

            <div class="number-button" onclick="addToNumber('4')">4<br>GHI</div>
            <div class="number-button" onclick="addToNumber('5')">5<br>JKL</div>
            <div class="number-button" onclick="addToNumber('6')">6<br>MNO</div>

            <div class="number-button" onclick="addToNumber('7')">7<br>PQRS</div>
            <div class="number-button" onclick="addToNumber('8')">8<br>TUV</div>
            <div class="number-button" onclick="addToNumber('9')">9<br>WXYZ</div>

            <div class="number-button" onclick="addToNumber('*')">*</div>
            <div class="number-button" onclick="addToNumber('0')">0</div>

            <div class="number-button" onclick="addToNumber('#')">#</div>
        </div>
        <br>
        <div class="dial-pad">
            <br>
            <div class="circle" id="dialButton" style='background: linear-gradient(180deg, #86FC6F 0%, #0CD419 100%'>
                {{-- <button type='submit' class="hidden-button"></button><svg width="16" height="16"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M21.384,17.752a2.108,2.108,0,0,1-.522,3.359,7.543,7.543,0,0,1-5.476.642C10.5,20.523,3.477,13.5,2.247,8.614a7.543,7.543,0,0,1,.642-5.476,2.108,2.108,0,0,1,3.359-.522L8.333,4.7a2.094,2.094,0,0,1,.445,2.328A3.877,3.877,0,0,1,8,8.2c-2.384,2.384,5.417,10.185,7.8,7.8a3.877,3.877,0,0,1,1.173-.781,2.092,2.092,0,0,1,2.328.445"
                        fill="#FFFFFF" />
                </svg> --}}
                <button type="submit"
                    style="background: linear-gradient(180deg, #86FC6F 0%, #0CD419 100%); border: none; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M21.384,17.752a2.108,2.108,0,0,1-.522,3.359,7.543,7.543,0,0,1-5.476.642C10.5,20.523,3.477,13.5,2.247,8.614a7.543,7.543,0,0,1,.642-5.476,2.108,2.108,0,0,1,3.359-.522L8.333,4.7a2.094,2.094,0,0,1,.445,2.328A3.877,3.877,0,0,1,8,8.2c-2.384,2.384,5.417,10.185,7.8,7.8a3.877,3.877,0,0,1,1.173-.781,2.092,2.092,0,0,1,2.328.445"
                            fill="#FFFFFF" />
                    </svg>
                </button>

            </div>

            <div class="circle" onclick="rejectCall()"
                style='background: linear-gradient(180deg, #800000 0%, #450000 100%'>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                    id="end-call">
                    <path fill="#FFFFFF"
                        d="M4.51 15.48l2-1.59c.48-.38.76-.96.76-1.57v-2.6c3.02-.98 6.29-.99 9.32 0v2.61c0 .61.28 1.19.76 1.57l1.99 1.58c.8.63 1.94.57 2.66-.15l1.22-1.22c.8-.8.8-2.13-.05-2.88-6.41-5.66-16.07-5.66-22.48 0-.85.75-.85 2.08-.05 2.88l1.22 1.22c.71.72 1.85.78 2.65.15z">
                    </path>
                </svg>
            </div>
        </div>
    </form>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Response Message</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>

    <script>
        function addToNumber(digit) {
            const phoneNumberInput = document.getElementById('phoneNumber');
            phoneNumberInput.value += digit;
        }

        function dialCall() {
            const phoneNumberInput = document.getElementById('phoneNumber');
            const phoneNumbers = phoneNumberInput.value;
            alert('Dialing ' + phoneNumbers);
            phoneNumberInput.value = '';

        }

        function rejectCall() {
            alert('Call rejected');
            document.getElementById('phoneNumber').value = '';
        }
        //
        $(document).ready(function() {
            $("#callForm").submit(function(event) {
                event.preventDefault();

                const phoneNumberInput = $("#phoneNumber");
                const phoneNumbers = phoneNumberInput.val();
                $.ajax({
                    url: "makecal22",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    data: {
                        phoneNumber: phoneNumbers
                    },
                    success: function(response) {
                        // alert("Call initiated successfully");
                        $("#myModal .modal-body").html(response.message);
                        $("#myModal").modal("show");
                        phoneNumberInput.val('');
                    },
                    error: function(xhr, status, error) {
                        alert("Error: " + error);
                    }
                });
            });
        });
    </script>

</body>

</html>
