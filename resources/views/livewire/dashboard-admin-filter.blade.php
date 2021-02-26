<div>
    <div class="row">
        @foreach ($promos as $promo)

        <div class="col-3">
            <span class="badge badge-pill badge-warning badgecounter">
                <input type="checkbox" id="{{$promo->id}}" class="mr-2"
                    wire:model="promofilter.{{$promo->id}}" />{{$promo->year.' / '.$promo->city}}
            </span>

        </div>

        @endforeach

    </div>

    @if (count($trainees)>0)
    <table class="table table-hover mt-5">
        <thead>
            <tr class="table-active">
                <th scope="col">Stagiaire</th>
                <th scope="col">Promo</th>
                <th scope="col">Total Demandes</th>
                <th scope="col">Total Relances</th>
                <th scope="col">Total Négatives</th>
                <th scope="col">Total Positives</th>

                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($trainees as $data)
            <tr class="my-auto">
                @if ($data->traineeships->where('status','Positive')->count()>0)
                <th scope="row" class="table-success">{{ $data->firstname.' '.$data->name}}</th>
                @else
                <th scope="row">{{ $data->firstname.' '.$data->name}}</th>
                @endif

                <td><span class="badge badge-pill badge-warning">
                        {{$data->promo->year. ' / '.$data->promo->city}}
                    </span></td>
                <td style="text-align:center"><span
                        class="badge badge-info badgecounter">{{$data->traineeships->count()}}</span>

                </td>
                <td style="text-align:center"><span
                        class="badge badge-warning badgecounter">{{$data->traineeships->where('status','Relancée')->count()}}</span>
                </td>

                <td style="text-align:center"><span
                        class="badge badge-danger badgecounter">{{$data->traineeships->where('status','Négative')->count()}}</span>
                </td>

                <td style="text-align:center"><span
                        class="badge badge-success badgecounter">{{$data->traineeships->where('status','Positive')->count()}}</span>
                </td>


                <td class="d-flex align-items-center">

                    <a href="{{route('admins.show', $data->id)}}">Détails</a>
                    <button type="button" class="btn btn-danger mx-3"
                        onclick="document.getElementById('modal-open-{{$data->id}}').style.display='block'">Supprimer</button>
                    <form action="{{ route('trainees.destroy', $data->id) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <div class="modal" id="modal-open-{{$data->id}}">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">La suppresion d'un stagiaire est définitive</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            onclick="document.getElementById('modal-open-{{$data->id}}').style.display='none'"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Etes-vous sûr de vouloir supprimer ce stagiaire ?</p>
                                        <h4>L'ensemble des données concernant ce stagiaire : compte USER, Skills,
                                            Journal de stage seront DEFINITIVEMENT SUPPRIMEES!!!</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">oui</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                            onclick="document.getElementById('modal-open-{{$data->id}}').style.display='none'">Annuler</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @else
    <h5> Pas de stagiaires enregistrées</h5>
    @endif

</div>
