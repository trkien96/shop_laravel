<header>
    <div class="wrap-main /">
        <a class="logo " title="Về trang chủ Thegioididong.com" href="index.html" aria-label="logo">
            <i class="icontgdd-logo"></i>
        </a>
        <form id="search-site" action="https://www.thegioididong.com/tim-kiem" method="get" autocomplete="off">
            <input class="topinput" id="search-keyword" name="key" type="text" aria-label="Bạn tìm gì..."
                   placeholder="Bạn tìm gì..." autocomplete="off" onkeyup="SuggestSearch(event,this, 0);"
                   maxlength="50"/>
            <button class="btntop" type="submit" aria-label="tìm kiếm"><i class="icontgdd-topsearch"></i></button>
        </form>
        <nav>
            @foreach($categories as $category)
                <a href="{{$category->c_slug}}" class="{{$category->c_slug}}" title="{{$category->c_title_seo}}">
                    <i class="{{$category->c_icon}}"></i>
                    {{ $category->c_name}}
                </a>
            @endforeach
        </nav>
    </div>
    <div class="clr"></div>
</header>