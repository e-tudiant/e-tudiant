<div class="col-sm-1 hidden-xs inter"></div>
<div class="tab col-sm-8 show-answer">
    <div id="response" class="tab-pane fade in active">
        <div class="title">
            <h3>Réponses</h3>
        </div>
        <div class="tab-content">
            <div class="btn-create">
                {!! link_to_route('answer.create', 'Ajouter une réponse', ['question_id' => $question->id]) !!}
            </div>
            @foreach ($answers as $answer)
                @if($answer == $answers->last())
                    <div class="info-line last row">
                @else
                    <div class="info-line row">
                @endif
                    <div class="info-name col-sm-5 col-xs-12">{!! $answer->answer !!}
                        @if($answer->correct)
                            <br><small class="right"><i class="fa fa-check" aria-hidden="true"></i>correct</small>
                        @else
                            <br><small class="wrong"><i class="fa fa-times" aria-hidden="true"></i>incorrect</small>
                        @endif</div>

                    <div class="btn-show col-sm-3 col-xs-12">{!! link_to_route('answer.show', 'Voir', [$answer->id]) !!}</div>
                    <div class="btn-edit col-sm-3 col-xs-12"> {!! link_to_route('answer.edit', 'Modifier', [$answer->id]) !!}</div>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['answer.destroy', $answer->id]]) !!}
                    <div class="btn-delete col-sm-1 col-xs-12">{!! Form::submit('Supprimer', ['onclick' => "return confirm('Supprimer ?')"]) !!}</div>
                    {!! Form::close() !!}
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
