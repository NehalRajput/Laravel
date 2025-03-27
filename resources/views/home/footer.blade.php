<footer>
    @php
        $footerBlock = \App\Models\StaticBlock::where('slug', 'footer')->first();
    @endphp

    @if($footerBlock)
        <div class="footer-content">
            <h3>{{ $footerBlock->title }}</h3>
            {!! $footerBlock->content !!}
        </div>
    @endif

    <!-- Your existing footer content -->
    <div class="cpy_">
        <p class="mx-auto">© 2024 All Rights Reserved</p>
    </div>
</footer>