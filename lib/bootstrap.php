<?php

function openingBracket( & $before, & $after, & $level, $prev )
{
    if ( $prev
        && $prev != ','
    ) {
        $before = "\n" . str_pad( '', $level, "\t", STR_PAD_LEFT );
    }

    $after  = "\n";

    $level++;
    
    $after .= str_pad( '', $level, "\t", STR_PAD_LEFT );
}

function closingBracket( & $before, & $after, & $level, $prev )
{
    $level--;

    $before = "\n" . str_pad( '', $level, "\t", STR_PAD_LEFT );

    if ( $next
        && $next != ','
    ) {
        $after = "\n" . str_pad( '', $level, "\t", STR_PAD_LEFT );
    }
}

if ( $_POST ) {
    $from = stripslashes( $_POST['from'] );

    $limit = strlen( $from );

    $to = '';

    $level = 0;

    $inString = false;

    for ( $i = 0; $i < $limit; $i++ ) {
        $char = $from[$i];
        $next = ( isset( $from[$i + 1] ) )
                ? $from[$i + 1]
                : null;
        $prev = ( $i > 0 )
                ? $from[$i - 1]
                : null;

        $before = '';
        $after  = '';

        switch ( $char ) {
            case '{':
                if ( ! $inString ) {
                    openingBracket( $before, $after, $level, $prev );
                }
                break;
            case '[':
                if ( ! $inString ) {
                    openingBracket( $before, $after, $level, $prev );
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
                    closingBracket( $before, $after, $level, $next );
                }
                break;
            case ']':
                if ( ! $inString ) {
                    closingBracket( $before, $after, $level, $next );
                }
                break;
            default:
                break;
        }

        $to .= $before . $char . $after;
    }
}

