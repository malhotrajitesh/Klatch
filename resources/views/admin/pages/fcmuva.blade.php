@extends('layouts.admin')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
          
         <center>
                <button id="uvanoti" onclick="initFirebaseMessagingRegistration()" class="btn btn-success">Allow for Notification</button>
            </center>
        </div>
    </div>

<div class="card">
    <div class="card-header">
        {{ trans('Send') }} {{ trans('Notification') }}
    </div>

    <div class="card-body">
             <form action="{{ route('admin.pages.sendfcm') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label>Body</label>
                            <textarea class="form-control" name="body"></textarea>
                          </div>
                        <button type="submit" class="btn btn-primary">Send Notification</button>
                    </form>
                  
                      


    </div>
</div>
@endsection
@section('scripts')
<!--<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script> -->
<script src="https://www.gstatic.com/firebasejs/8.9.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.9.0/firebase-messaging.js"></script>

<script src="https://www.gstatic.com/firebasejs/8.9.0/firebase-analytics.js"></script>
<script>

    var firebaseConfig = {
        apiKey: "AIzaSyBPURVyabGzv_Ux8kEHgwRks41zmNSrDts",
    authDomain: "joinradix-898ba.firebaseapp.com",
    projectId: "joinradix-898ba",
    storageBucket: "joinradix-898ba.appspot.com",
    messagingSenderId: "710346887222",
    appId: "1:710346887222:web:e53d44da5c23d1b32a0897",
    measurementId: "G-TPR65MYC5D"
    };

    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();

    function initFirebaseMessagingRegistration() {
            messaging
            .requestPermission()
            .then(function () {
                return messaging.getToken()
            })
            .then(function(token) {
                console.log(token);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{ route("admin.pages.saveftokn") }}',
                    type: 'POST',
                    data: {
                        token: token
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        alert('Token saved successfully.');
                    },
                    error: function (err) {
                        alert('User Token Error'+ err);
                    },
                });

            }).catch(function (err) {
                alert('User Token Error'+ err);
            });
     }

    messaging.onMessage(function(payload) {
        const noteTitle = payload.notification.title;
        const noteOptions = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };
        new Notification(noteTitle, noteOptions);
    });

</script>
@endsection