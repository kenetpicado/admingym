<?php

namespace App\Traits;

trait RulesTraits
{
    protected $rules = [
        'plan.servicio'     => 'required',
        'plan.plan'         => 'required',
        'plan.beca'         => 'required|numeric|min:0',
        'plan.created_at'   => 'required|date',
        'plan.nota'         => 'nullable|max:30',
        'plan.monto'        => 'required|numeric',
        'plan.fecha_fin'    => 'required|date',
    ];

    protected $messages = [
        'plan.monto.required' => 'No hay un precio para el servicio y plan seleccionado.'
    ];
}