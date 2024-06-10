<div>
    @if(session()->has('message'))
        <div class="custom-toast">
            <div class="ui icon green floating message transition " id="success">
                <i class="close icon " id="close"></i>
                <i class="notched circle loading icon"></i>
                <div class="content">
                    <div class="header">
                        {{ session('message') }}
                    </div>
                    <p></p>
                </div>
            </div>
        </div>
    @endif
    @if(session()->has('error'))
        <div class="custom-toast">
            <div class="ui icon red floating message transition " id="message">
                <i class="close icon " id="error"></i>
                <i class="notched circle loading icon"></i>
                <div class="content">
                    <div class="header">
                        {{ session('error') }}
                    </div>
                    <p></p>
                </div>
            </div>
        </div>
    @endif
</div>
