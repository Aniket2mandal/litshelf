<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<link rel="stylesheet" href="/css/admin/dashboard.css">
<link rel="stylesheet" href="/css/admin/category.css">
<body>
    <div class="dashboard">
        <div class="left-dashboard">
            <div class="header">
                <h1>Admin</h1>
            </div>
            <div class="dashboard-list">
                <ul>
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('books.index')}}">Books</a></li>
                    <li><a href="#">Orders</a></li>
                    <li><a href="{{route('users.index')}}">Users</a></li>
                    <li><a href="{{route('categories.index')}}">Categories</a></li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="#">Roles</a></li>
                    <li><a href="#">Permissions</a></li>
                    <li><a href="{{route('admin.logout')}}">Logout</a></li>
                </ul>
            </div>
        </div>
        <div class="right-dashboard">
            <div class="nav">
                <div class="logo">
                    <h1 style="margin:0;padding:0">LitShelf</h1>
                </div>
                <div class="nav-profile">
                    <a href="{{route('admin.profile')}}"><img src="{{asset('css/raw/profile.png')}}"></a>
                </div>
            </div>

           @yield('content')


           <div class="copyright">
            <p>  @copyright claim LitShelf</p>
          </div>
<script>
 /* When the user clicks on the image,
           toggle between hiding and showing the dropdown content */
           function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            // Check if the click was outside the nav-profile div
            if (!event.target.closest('.nav-profile')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
</script>


</body>

</html>
