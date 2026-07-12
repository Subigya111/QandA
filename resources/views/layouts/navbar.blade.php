@php
    $route = Route::currentRouteName();
    $user = Auth::user();
@endphp

<style>
    .site-header,.nav-actions,.user-section{display:flex;align-items:center;flex-wrap:wrap}
    .site-header{justify-content:space-between;gap:1rem;background:#9d174d;padding:.75rem 1.5rem}
    .nav-actions,.user-section{gap:1rem}
    .brand a{color:#fff;text-decoration:none}
    .brand small{display:block;margin-top:.4rem;color:#cbd5e1;font-size:.85rem}
    .nav-actions :is(a,button){background:#9d174d;color:#fff;padding:.55rem .95rem;border:0;border-radius:.5rem;text-decoration:none;cursor:pointer}
    .user-avatar{width:48px;height:48px;border-radius:50%;object-fit:cover;}
    .search-form input{padding:.5rem .75rem;border:0;border-radius:.5rem}
    
</style>

<nav class="site-header">
    <div class="brand">
        <a href="#">The Blog-App</a>
        <small>Made with Laravel ❤️ by <a href="#" target="_blank">Subigya</a></small>
    </div>
    
    <div class="nav-actions">
        @auth
        
            @if($route !== 'posts.user')
                <div class="user-section">
                    <span class="user-name">- Hi, {{ $user->name }}</span>
                    <a href="#">
                        @if($user->imagePath)
                            <img src="{{ asset('storage/'.$user->imagePath) }}" alt="{{ $user->name }}" class="user-avatar">
                        @else
                            <div class="user-avatar"></div>
                        @endif
                    </a>
                </div>
            @else
                <a href="{{ url()->previous() }}" class="back-btn">← Back</a>
            @endif
            
            @if($route !== 'showAllQuestion') <form method="GET" action="{{ route('showAllQuestion') }}">
                <button type="submit" class="btn create-btn"> Home</button>
            </form> @endif
            @if($route !== 'showQuesForm') <form method="POST" action="{{ route('showQuesForm') }}">
                @csrf
                <button type="submit" class="btn create-btn"> Add</button>
            </form> @endif
            

            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit">Log out</button>
            </form>
            <form action="{{route('categoryQuestions')}}" method="GET" class="search-form">
                <input type="text" name="category" placeholder="Search category..." value="{{ request('category') }}">
                <button type="submit">🔍</button>
                </form>
        @else
            <a href="{{route('login')}}">Login</a>
            <a href="{{route('registerForm')}}">Register</a>
        @endauth
    </div>
</nav>