<div>
{{--    @if(session()->has('message'))--}}
{{--        <div class="custom-toast">--}}
{{--            <div class="ui icon green floating message transition " id="fermer">--}}
{{--                <i class="close icon " id="close"></i>--}}
{{--                <i class="notched circle loading icon"></i>--}}
{{--                <div class="content">--}}
{{--                    <div class="header">--}}
{{--                        {{ session('message') }}--}}
{{--                    </div>--}}
{{--                    <p></p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    @if(session()->has('error'))--}}
{{--        <div class="custom-toast">--}}
{{--            <div class="ui icon red floating message transition " id="message">--}}
{{--                <i class="close icon " id="error"></i>--}}
{{--                <i class="notched circle loading icon"></i>--}}
{{--                <div class="content">--}}
{{--                    <div class="header">--}}
{{--                        {{ session('error') }}--}}
{{--                    </div>--}}
{{--                    <p></p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}

        <script>

            document.addEventListener('DOMContentLoaded', function () {
                @if(session()->has('error'))
                $.toast({
                    title: 'Workflow ATD',
                    message: '{{session('error')}}',
                    showProgress: 'bottom',
                    class: 'error',
                })
                ;


                @endif

                @if(session()->has('message'))

                $.toast({
                    title: 'Workflow ATD',
                    message: '{{session('message')}}',
                    showProgress: 'bottom',
                    class: 'success',
                })
                ;

                @endif
            })






        </script>
</div>

