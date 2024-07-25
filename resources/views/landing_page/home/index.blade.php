@extends('landing_page.partials.main')

@section('container')
    @include('landing_page.components.preloader.index')

    @include('landing_page.components.sidemenu.index')

    @include('landing_page.components.mobile_menu.index')

    @include('landing_page.components.header.index')

    @include('landing_page.components.hero.index')

    @include('landing_page.components.category.index')

    @include('landing_page.components.about.index')

    @include('landing_page.components.product.index')

    @include('landing_page.components.offer.index')

    @include('landing_page.components.blog.index')

    @include('landing_page.components.footer.index')

    @include('landing_page.components.scroll_top.index')
@endsection
