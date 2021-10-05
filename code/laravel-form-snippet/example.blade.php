<form method="POST" action="#">
    @csrf
    <div class="header">
        {{ __('Registrasi Akun') }}
    </div>

    @include('component.input',[
    'label' => 'Nama Lengkap',
    'name' => 'full_name',
    'placeholder' => 'Masukkan nama lengkap'])

    @include('component.input',[
    'type' => 'email',
    'label' => 'Email',
    'name' => 'email',
    'placeholder' => 'Masukkan email'])

    @include('component.input-append', [
    'labelLeft' => '+62',
    'label' => 'Nomor Handphone',
    'id' => 'msisdn',
    'name' => 'msisdn',
    'placeholder' => '812xxxxxxxxxx'])

    <div class="form-group">
        <div>{{ __('Jenis Kelamin') }}</div>
        @include('component.radio',[
        'classDiv' => 'mr-5',
        'inline'=>true,
        'name'=>'gender',
        'value'=>'female',
        'id'=>'gender-1',
        'label' => 'Wanita'])

        @include('component.radio',[
        'inline'=>true,
        'name'=>'gender',
        'value'=>'male',
        'id'=>'gender-2',
        'label' => 'Pria'])
    </div>

    @include('component.input-append', [
    'type' => 'password',
    'label' => 'Kata Sandi',
    'name' => 'password',
    'id' => 'password',
    'showHide' => true,
    'showHideClass' => 'show-hide',
    'placeholder' => 'Masukkan kata sandi'])

    @include('component.input-append', [
    'type' => 'password',
    'label' => 'Konfirmasi Kata Sandi',
    'name' => 'password_confirmation',
    'id' => 'password_confirmation',
    'showHide' => true,
    'showHideClass' => 'show-hide',
    'placeholder' => 'Masukkan kata sandi'])

    @include('component.checkbox',[
    'name' => 'is_subscribe',
    'id' => 'is_subscribe',
    'value' => 1,
    'classDiv' => 'mt-5',
    'label' => 'Saya ingin mendapatkan buletin terbaru'])

    <button class="btn-primary">{{ __('Daftar') }}</button>
</form>
