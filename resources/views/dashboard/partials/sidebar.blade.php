<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset("dashboard/img/sidebar-1.jpg") }}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->

    <div class="logo">
        <a href="{{ route('post.index') }}" class="simple-text logo-normal">
            {{env('APP_NAME')}}
        </a>
        <div>
            <p class="font-weight-bold text-center text-black-50 pt-4">Hello {{auth()->user()->name}}.</p>
        </div>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
            <li class="nav-item {{ Request::path() == 'dashboard/user' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('user.index') }}">
                    <div class="d-flex justify-content-between">
                        <span class="material-icons md-48">face</span>
                        <p>Usuarios</p>
                    </div>
                </a>
            </li>
            <li class="nav-item {{ Request::path() == 'dashboard/tag' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('tag.index') }}">
                    <div class="d-flex justify-content-between">
                        <span class="material-icons md-48">loyalty</span>
                        <p>Tags</p>
                    </div>
                </a>
            </li>
            <li class="nav-item {{ Request::path() == 'dashboard/category' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('category.index') }}">
                    <div class="d-flex justify-content-between">
                        <span class="material-icons md-48">label</span>
                        <p>Categorias</p>
                    </div>
                </a>
            </li>
            <li class="nav-item {{ Request::path() == 'dashboard/post' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('post.index') }}">
                    <div class="d-flex justify-content-between">
                        <span class="material-icons md-48">dynamic_feed</span>
                        <p>Posts</p>
                    </div>
                </a>
            </li>
            <li class="nav-item {{ Request::path() == 'dashboard/post-comment' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('post-comment.index') }}">
                    <div class="d-flex justify-content-between">
                        <span class="material-icons md-48">question_answer</span>
                        <p>Comentarios</p>
                    </div>
                </a>
            </li>
            <li class="nav-item {{ Request::path() == 'dashboard/contact' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('contact.index') }}">
                    <div class="d-flex justify-content-between">
                        <span class="material-icons md-48">contacts</span>
                        <p>Contactos</p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>
