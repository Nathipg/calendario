<?php

class Calendario {

	private $diasSemanaSigla = array( 'Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb' );
	private $meses = array( '', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro' );

	public function quantidadeDiasMes( $mes = null, $ano = null ) {
		$mes = $mes == null ? date('m') : $mes;
		$ano = $ano == null ? date('Y') : $ano;
		return cal_days_in_month( CAL_GREGORIAN, $mes, $ano );
	}

	public function diaSemanaData( $dia = null, $mes = null, $ano = null ) {
		$dia = $dia == null ? date('d') : $dia;
		$mes = $mes == null ? date('m') : $mes;
		$ano = $ano == null ? date('Y') : $ano;
		return date( 'w', mktime( 0, 0, 0, $mes, $dia, $ano) );
	}

	public function mostrarMes( $mes = null, $ano = null ) {
		$mes = $mes == null ? (int) date('m') : (int) $mes;
		$ano = $ano == null ? date('Y') : $ano;

		$quantidadeDiasMes = $this->quantidadeDiasMes( $mes );
		$diasVaziosInicio = $this->diaSemanaData( 1, $mes, $ano );

		$tabelaMes = '
			<table>
				<thead>
					<tr class="titulo-mes">
						<th colspan="7">' . $this->meses[$mes] . '</th>
					</tr>
					<tr>
						<td>' . implode('</td><td>', $this->diasSemanaSigla) . '</td>
					</tr>
				</thead>
				<tbody>
		';

		$totalDias = 1;
		while( $quantidadeDiasMes >= $totalDias ) {
			$tabelaMes .= '<tr>';

			for( $i = 1; $i <= 7; $i++) {

				if( ($totalDias > $quantidadeDiasMes)  ) {
					$tabelaMes .= '<td></td>';
				} elseif( $diasVaziosInicio != 0 ) {
					$tabelaMes .= '<td></td>';
					$diasVaziosInicio--;
				} else {
					switch( $this->diaSemanaData( $totalDias, $mes, $ano ) ) {
						case 0:
							$tabelaMes .= '<td class="domingo">' . $totalDias . '</td>';
							break;
						case 6:
							$tabelaMes .= '<td class="sabado">' . $totalDias . '</td>';
							break;
						default:
							$tabelaMes .= '<td>' . $totalDias . '</td>';
							break;
					}
					$totalDias++;
				}

			}

			$tabelaMes .= '</tr>';
		}

		$tabelaMes .= '
				</tbody>
			</table>
		';

		echo $tabelaMes;
	}

	public function mostrarAno( $ano = null ) {
		$ano = $ano == null ? date('Y') : $ano;

		for( $i = 1; $i <= 12; $i++ ) {
			$this->mostrarMes( $i, $ano );
		}
	}

}

?>