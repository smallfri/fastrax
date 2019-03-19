<?php

$categories = \App\Category::get()->toTree(); ?>

<div class="column">
    <div id="dl-menu" class="dl-menuwrapper">
        <button class="dl-trigger">Open Menu</button>
        <ul class="dl-menu">
            @foreach($categories as $category)
                <li>
                    <a href="/posts/{{$category->id}}/list">{{$category->category_name}}</a>
                    <ul class="dl-submenu">
                        @foreach($category->children as $cats)
                            <li>
                                <a href="/posts/{{$cats->id}}/list">{{$cats->category_name}}</a>
                                <ul class="dl-submenu">
                                    @foreach($cats->children as $subcats)
                                        <li><a href="/posts/{{$subcats->id}}/list">{{$subcats->category_name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div><!-- /dl-menuwrapper -->
</div>