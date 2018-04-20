<script src="{{ asset('js/clipboard.min.js') }}"></script>
@unless(empty($casinoOperators))
    @foreach($casinoOperators as $casinoOperatorForJS)
        <script>
            $('.casino-name-{{ $casinoOperatorForJS->slug }}').tooltip({
                trigger: 'click',
                placement: 'top'
            });

            function setTooltipForCasinoName(btn, message) {
                $('.casino-name-{{ $casinoOperatorForJS->slug }}').tooltip('hide')
                    .attr('data-original-title', message)
                    .tooltip('show');
            }

            function hideTooltipForCasinoName(btn) {
                setTimeout(function () {
                    $('.casino-name-{{ $casinoOperatorForJS->slug }}').tooltip('hide');
                }, 500);
            }

            var clipboardForCasinoName = new Clipboard('.casino-name-{{ $casinoOperatorForJS->slug }}');

            clipboardForCasinoName.on('success', function (e) {
                setTooltipForCasinoName(e.trigger, 'Copied!');
                hideTooltipForCasinoName(e.trigger);

                console.info('Action:', e.action);
                console.info('Text:', e.text);
                e.clearSelection();
            });

            clipboardForCasinoName.on('error', function (e) {
                setTooltipForCasinoName(e.trigger, 'Failed!');
                hideTooltipForCasinoName(e.trigger);

                console.info('Action:', e.action);
                console.info('Text:', e.text);
                e.clearSelection();
            });

            $('.casino-logo-{{ $casinoOperatorForJS->slug }}').tooltip({
                trigger: 'click',
                placement: 'top'
            });

            function setTooltipForCasinoLogo(btn, message) {
                $('.casino-logo-{{ $casinoOperatorForJS->slug }}').tooltip('hide')
                    .attr('data-original-title', message)
                    .tooltip('show');
            }

            function hideTooltipForCasinoLogo(btn) {
                setTimeout(function () {
                    $('.casino-logo-{{ $casinoOperatorForJS->slug }}').tooltip('hide');
                }, 500);
            }

            var clipboardForCasinoLogo = new Clipboard('.casino-logo-{{ $casinoOperatorForJS->slug }}');

            clipboardForCasinoLogo.on('success', function (e) {
                setTooltipForCasinoName(e.trigger, 'Copied!');
                hideTooltipForCasinoName(e.trigger);

                console.info('Action:', e.action);
                console.info('Text:', e.text);
                e.clearSelection();
            });

            clipboardForCasinoLogo.on('error', function (e) {
                setTooltipForCasinoName(e.trigger, 'Failed!');
                hideTooltipForCasinoName(e.trigger);

                console.info('Action:', e.action);
                console.info('Text:', e.text);
                e.clearSelection();
            });
        </script>

        <script>
            <?php $explode_permalink2 = explode(',', $casinoOperatorForJS->permalink); ?>
            $('.show-casino-permalink-{{ $explode_permalink2[12] }},.show-casino-permalink-{{ $explode_permalink2[13] }},.show-casino-permalink-{{ $explode_permalink2[14] }}').tooltip({
                trigger: 'click',
                placement: 'top'
            });

            function setTooltip(btn, message) {
                $('.show-casino-permalink-{{ $explode_permalink2[12] }},.show-casino-permalink-{{ $explode_permalink2[13] }},.show-casino-permalink-{{ $explode_permalink2[14] }}').tooltip('hide')
                    .attr('data-original-title', message)
                    .tooltip('show');
            }

            function hideTooltip(btn) {
                setTimeout(function () {
                    $('.show-casino-permalink-{{ $explode_permalink2[12] }},.show-casino-permalink-{{ $explode_permalink2[13] }},.show-casino-permalink-{{ $explode_permalink2[14] }}').tooltip('hide');
                }, 500);
            }

            var clipboard = new Clipboard('.show-casino-permalink-{{ $explode_permalink2[12] }},.show-casino-permalink-{{ $explode_permalink2[13] }},.show-casino-permalink-{{ $explode_permalink2[14] }}');

            clipboard.on('success', function (e) {
                setTooltip(e.trigger, 'Copied!');
                hideTooltip(e.trigger);

                console.info('Action:', e.action);
                console.info('Text:', e.text);
                e.clearSelection();
            });

            clipboard.on('error', function (e) {
                setTooltip(e.trigger, 'Failed!');
                hideTooltip(e.trigger);

                console.info('Action:', e.action);
                console.info('Text:', e.text);
                e.clearSelection();
            });
        </script>
    @endforeach
@endunless