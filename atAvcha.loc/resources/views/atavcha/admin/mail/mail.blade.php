<div id="" class="form_mail">
    <span id="status_mail" class="alert-status">
    </span>
    <form id="form_mail" action="{{route('admin.sendmail.store')}}" method="post" >
        @csrf
        <input type="text" name="name" placeholder="Имя">
        <input type="email" name="email" placeholder="Адрес почтовый">
        <textarea name="text" placeholder="Текст письма"></textarea>
        <button type="submit">Отправить</button>
    </form>
</div>
