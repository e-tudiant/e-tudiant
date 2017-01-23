<div class="tab col-sm-8">
    <div id="quizz" class="tab-pane fade in active show-question">
        <div class="title">
            <h3>Questions</h3>
        </div>
        <div class="tab-content">
            <div class="btn-create">{!! link_to_route('question.create', 'Ajouter un question', ['quizz_id' => $quizz->id]) !!}</div>

            @foreach ($questions as $question)
                @if($question == $questions->last())
                    <div class="info-line last row">
                @else
                    <div class="info-line row">
                @endif
                        <div class="info-name col-sm-5 col-xs-12">{!! $question->question !!}</div>
                        <div class="btn-show col-sm-3 col-xs-12">{!! link_to_route('question.show', 'Voir', [$question->id]) !!}</div>
                        <div class="btn-edit col-sm-3 col-xs-12">{!! link_to_route('question.edit', 'Modifier', [$question->id]) !!}</div>

                        {!! Form::open(['method' => 'DELETE', 'route' => ['question.destroy', $question->id]]) !!}
                        <div class="btn-delete col-sm-1 col-xs-12">{!! Form::submit('Supprimer') !!}</div>
                        {!! Form::close() !!}
                    </div>
            @endforeach

            </div>
        </div>
    </div>
</div>

<style>
    .show-question .btn-create:first-of-type{
        width: 50%;
    }
</style>