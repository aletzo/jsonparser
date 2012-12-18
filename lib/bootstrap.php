<?php

function openingBracket( & $before, & $after, & $level )
{
    $before .= str_pad( '', $level, "\t", STR_PAD_LEFT );
    $after  = "\n";

    $level++;
    
    $after .= str_pad( '', $level, "\t", STR_PAD_LEFT );
}

function closingBracket( & $before, & $after, & $level )
{
    $before .= str_pad( '', $level, "\t", STR_PAD_LEFT );
    $after  = "\n";

    $level--;
    
    $after .= str_pad( '', $level, "\t", STR_PAD_LEFT );
}

if ( $_POST ) {
    $from = stripslashes( $_POST['from'] );

    $limit = strlen( $from );

    $to = '';

    $level = 0;

    $inString = false;

    for ( $i = 0; $i < $limit; $i++ ) {
        $char = $from[$i];

        $before = '';
        $after  = '';

        switch ( $char ) {
            case '{':
                if ( ! $inString ) {
                    openingBracket( $before, $after, $level );
                }
                break;
            case '[':
                if ( ! $inString ) {
                    $before = "\n";

                    openingBracket( $before, $after, $level );
                }
                break;
            case '"':
                $inString = ! $inString;
                break;
            case ',':
                if ( ! $inString ) {
                    $after = "\n" . str_pad( '', $level, "\t", STR_PAD_LEFT );
                }
                break;
            case '}':
                if ( ! $inString ) {
                    $level--;

                    $before = "\n";

                    closingBracket( $before, $after, $level );
                }
                break;
            case ']':
                if ( ! $inString ) {
                    $level--;

                    $before = "\n";

                    closingBracket( $before, $after, $level );
                }
                break;
            default:
                break;
        }

        $to .= $before . $char . $after;
    }
}

