<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard {!! $level !!}</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
</head>
<body>
    <div class="container mt-5">
        <h1>{!! $title !!}</h1>

        <p class="text-primary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima saepe velit assumenda itaque voluptatibus? Corrupti aliquid dignissimos dicta odio itaque. Nisi enim distinctio magnam nobis illo omnis, in aut, animi quae obcaecati autem quibusdam. Accusantium exercitationem tempore inventore corrupti et facilis nisi dolores necessitatibus veritatis, eos culpa id dolorem ipsam, cum, laboriosam consectetur impedit! Dignissimos ratione cupiditate totam minima delectus dolorem obcaecati. Explicabo, totam enim ipsa illo exercitationem optio consequuntur sapiente quod id veritatis quo! Nostrum autem voluptate quis quidem doloremque laborum dolorum, sequi, officiis doloribus, sed neque dignissimos praesentium iste eaque vel accusantium? Expedita aut aliquam nisi asperiores illo.</p>
        
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus consequuntur autem reprehenderit quae totam corrupti. Laudantium, maxime neque! Dignissimos itaque, inventore quibusdam, minus dolorum, voluptates temporibus quo nostrum autem dolores dicta voluptatibus magnam impedit! Aliquid adipisci cupiditate animi suscipit asperiores! Est consequuntur accusamus dolorum non. Porro itaque labore error maiores.</p>
    </div>

    <form action="/logout" method="post">
        @csrf
        <button type="submit">logout</button>
    </form>

    

    <script src="js/coba.js"></script>
</body>
</html>