<style>
    #skills {
        padding: 50px 15px;
        text-align: center;
    }

    #skills h2 {
        color: #374054;
        margin-bottom: 30px;
    }

    #skills ul {
        display: block;
        margin: 0 auto;
        padding: 0;
        max-width: 800px;
    }

    #skills li {
        display: inline-block;
        margin: 5px;
        padding: 3px 10px;
        color: #374054;
        background: #e4e4ea;
        list-style: none;
        cursor: default;
        font-size: 0.9em;
        font-weight: 800;
        border-radius: 50px;
        cursor: pointer;
    }
</style>
<div id="skills">
    <h2 class="heading">Find jobs using your preferred skills</h2>
    <ul>
        @foreach ($skills as $skill)
            <?php $color = rand(0,255).','.rand(0,100).','.rand(0,155); ?>
            <li style="background-color: rgba({{ $color }}, 0.1); color: rgb({{ $color }})">{{ $skill }}</li>
        @endforeach
    </ul>
</div>