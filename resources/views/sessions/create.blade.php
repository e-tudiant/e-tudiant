<?php
if (isset($_POST['errors'])) {
    $errors = unserialize(base64_decode($_POST['errors']));
}
?>
<div class="tab quizz-create">
	<div id="quizz" class="tab-pane fade in active ">
		<div class="title">
			<h3>Quizz</h3>
		</div>

		<div class="tab-content">
		{!! Form::open(array('url' => 'session/' . $quizz->id . '/' . $classroom_id, 'method' => 'post')) !!}
			@foreach($quizz->question as $question)
				<div>
					{{ $question->question }}

                    @foreach($question->answer as $answer)
                        {!! Form::label('question_' . $answer->question_id, $answer->answer) !!}
                        {!! Form::radio('question_' . $answer->question_id, $answer->id) !!}
                    @endforeach

                    {!! $errors->first('question_' . $answer->question_id, '<small class="help-block">:message</small>') !!}
                </div>
			@endforeach

			<div class="btn-create">
				{!! Form::submit('Sauvegarder') !!}
			</div>

		{!! Form::close() !!}
		</div>
	</div>
</div>
