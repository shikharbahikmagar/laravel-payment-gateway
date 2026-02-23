<!DOCTYPE html>
<html>
<head>
    <title>Pay with Esewa</title>
    <style>
        #payBtn {
            padding: 10px 20px;
            background: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        #payBtn:hover {
            background: #218838;
        }

        /* Loader styles */
        #loader {
            display: none;
            margin-top: 20px;
            font-size: 16px;
            color: #333;
        }

        .dot {
            display: inline-block;
            width: 10px;
            height: 10px;
            margin: 0 3px;
            background-color: #28a745;
            border-radius: 50%;
            animation: bounce 1s infinite;
        }

        .dot:nth-child(2) { animation-delay: 0.2s; }
        .dot:nth-child(3) { animation-delay: 0.4s; }

        @keyframes bounce {
            0%, 80%, 100% { transform: scale(0); }
            40% { transform: scale(1); }
        }
    </style>
</head>
<body onload="document.getElementById('esewaForm').submit();">

<!-- Hidden Dynamic Form -->
<form id="esewaForm" method="POST" action="{{ $response['action_url'] }}" style="display:none;">

    @foreach ($response['fields'] as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
    @endforeach

</form>

<!-- Loader -->
<div id="loader">
    Processing Payment
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
</div>

<script>
    const payBtn = document.getElementById('payBtn');
    const loader = document.getElementById('loader');

    payBtn.addEventListener('click', function() {
        loader.style.display = 'block'; // show loader
        document.getElementById('esewaForm').submit();
    });
</script>

</body>
</html>
