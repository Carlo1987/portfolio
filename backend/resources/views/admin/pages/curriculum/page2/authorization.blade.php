<div> 
    @foreach($texts[$curriculumSignatureId] as $text)
        {{ $text['text_' . $langDB] }}
    @endforeach
</div>

<div style="text-align:right;">
    <img id="signature" src="{{ public_path('images/curriculum/firma.png') }}" alt="signature" >
</div>
