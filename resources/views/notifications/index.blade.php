@section('content')
<div class="container">
    @if($notifications->isEmpty())
        <p>No notifications available.</p>
    @else
        @foreach($notifications as $notification)
            <div class="notification {{ $notification->is_read ? 'read' : 'unread' }}">
                <p>{{ $notification->message }}</p>
                <form action="{{ route('notifications.read', $notification->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Mark as Read</button>
                </form>
            </div>
        @endforeach
    @endif
</div>
@endsection