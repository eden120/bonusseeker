<div class="col-xs-12 col-md-8 oc-available-game-types">
    @if($getOperator->region->id === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                @if($getOperator->gt_casino_slots === 1)
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>
                @elseif($getOperator->gt_casino_slots === 0)
                    <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
                @endif

                <img src="{{ asset('img/icons/slot-machine.svg') }}" alt="Slots" class="img-responsive">
                <p>Slots</p>
            </div>
        </div>

        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                @if($getOperator->gt_casino_blackjack === 1)
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>
                @elseif($getOperator->gt_casino_blackjack === 0)
                    <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
                @endif

                <img src="{{ asset('img/icons/blackjack.svg') }}" alt="Blackjack" class="img-responsive">
                <p>Blackjack</p>
            </div>
        </div>

        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                @if($getOperator->gt_casino_roulette === 1)
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>
                @elseif($getOperator->gt_casino_roulette === 0)
                    <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
                @endif

                <img src="{{ asset('img/icons/roulette-table.svg') }}" alt="Roulette" class="img-responsive">
                <p>Roulette</p>
            </div>
        </div>

        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                @if($getOperator->gt_casino_live_games === 1)
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>
                @elseif($getOperator->gt_casino_live_games === 0)
                    <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
                @endif

                <img src="{{ asset('img/icons/live-games.svg') }}" alt="Live Games" class="img-responsive">
                <p>Live Games</p>
            </div>
        </div>

        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                @if($getOperator->gt_casino_video_poker === 1)
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>
                @elseif($getOperator->gt_casino_video_poker === 0)
                    <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
                @endif

                <img src="{{ asset('img/icons/poker.svg') }}" alt="Video Poker" class="img-responsive">
                <p>Video Poker</p>
            </div>
        </div>

        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                @if($getOperator->gt_casino_baccarat === 1)
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>
                @elseif($getOperator->gt_casino_baccarat === 0)
                    <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
                @endif

                <img src="{{ asset('img/icons/baccarat.svg') }}" alt="Baccarat" class="img-responsive">
                <p>Baccarat</p>
            </div>
        </div>

        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                @if($getOperator->gt_casino_bingo === 1)
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>
                @elseif($getOperator->gt_casino_bingo === 0)
                    <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
                @endif

                <img src="{{ asset('img/icons/bingo.svg') }}" alt="Bingo" class="img-responsive">
                <p>Bingo</p>
            </div>
        </div>

        @if($getOperator->gt_poker_texas_hold_em === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/texas-hold-em.svg') }}" alt="Texas Hold&#039;em" class="img-responsive">
                    <p>Texas Hold&#039;em</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_poker_omaha === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/omaha.svg') }}" alt="Omaha" class="img-responsive">
                    <p>Omaha</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_poker_stud === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/stud.svg') }}" alt="Stud" class="img-responsive">
                    <p>Stud</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_poker_draw === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/draw.svg') }}" alt="Draw" class="img-responsive">
                    <p>Draw</p>
                </div>
            </div>
        @endif

        {{----}}
        @if($getOperator->gt_sportsbetting_nfl === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/american-football.svg') }}" alt="NFL" class="img-responsive">
                    <p>NFL</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_sportsbetting_nba === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/basketball.svg') }}" alt="NBA" class="img-responsive">
                    <p>NBA</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_sportsbetting_mlb === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/baseball.svg') }}" alt="MLB" class="img-responsive">
                    <p>MLB</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_sportsbetting_mls === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/soccer-ball.svg') }}" alt="MLS" class="img-responsive">
                    <p>MLS</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_sportsbetting_nhl === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/hockey-puck.svg') }}" alt="NHL" class="img-responsive">
                    <p>NHL</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_sportsbetting_epl === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/football.svg') }}" alt="EPL" class="img-responsive">
                    <p>EPL</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_sportsbetting_esports === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/esports.svg') }}" alt="eSports" class="img-responsive">
                    <p>eSports</p>
                </div>
            </div>
        @endif

        {{----}}

        @if($getOperator->gt_racing_horse_racing === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/horse-racing.svg') }}" alt="Horse Racing" class="img-responsive">
                    <p>Horse Racing</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_racing_greyhound_racing === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/greyhound-racing.svg') }}" alt="Greyhound Racing" class="img-responsive">
                    <p>Greyhound Racing</p>
                </div>
            </div>
        @endif {{----}}

    @elseif($getOperator->region->id === 7)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                @if($getOperator->gt_casino_slots === 1)
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>
                @elseif($getOperator->gt_casino_slots === 0)
                    <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
                @endif

                <img src="{{ asset('img/icons/slot-machine.svg') }}" alt="Slots" class="img-responsive">
                <p>Slots</p>
            </div>
        </div>

        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                @if($getOperator->gt_casino_blackjack === 1)
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>
                @elseif($getOperator->gt_casino_blackjack === 0)
                    <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
                @endif

                <img src="{{ asset('img/icons/blackjack.svg') }}" alt="Blackjack" class="img-responsive">
                <p>Blackjack</p>
            </div>
        </div>

        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                @if($getOperator->gt_casino_roulette === 1)
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>
                @elseif($getOperator->gt_casino_roulette === 0)
                    <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
                @endif

                <img src="{{ asset('img/icons/roulette-table.svg') }}" alt="Roulette" class="img-responsive">
                <p>Roulette</p>
            </div>
        </div>

        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                @if($getOperator->gt_casino_live_games === 1)
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>
                @elseif($getOperator->gt_casino_live_games === 0)
                    <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
                @endif

                <img src="{{ asset('img/icons/live-games.svg') }}" alt="Live Games" class="img-responsive">
                <p>Live Games</p>
            </div>
        </div>

        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                @if($getOperator->gt_casino_video_poker === 1)
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>
                @elseif($getOperator->gt_casino_video_poker === 0)
                    <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
                @endif

                <img src="{{ asset('img/icons/poker.svg') }}" alt="Video Poker" class="img-responsive">
                <p>Video Poker</p>
            </div>
        </div>

        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                @if($getOperator->gt_casino_baccarat === 1)
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>
                @elseif($getOperator->gt_casino_baccarat === 0)
                    <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
                @endif

                <img src="{{ asset('img/icons/baccarat.svg') }}" alt="Baccarat" class="img-responsive">
                <p>Baccarat</p>
            </div>
        </div>

        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                @if($getOperator->gt_casino_bingo === 1)
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>
                @elseif($getOperator->gt_casino_bingo === 0)
                    <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
                @endif

                <img src="{{ asset('img/icons/bingo.svg') }}" alt="Bingo" class="img-responsive">
                <p>Bingo</p>
            </div>
        </div>

        {{----}}

        @if($getOperator->gt_poker_texas_hold_em === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/texas-hold-em.svg') }}" alt="Texas Hold&#039;em" class="img-responsive">
                    <p>Texas Hold&#039;em</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_poker_omaha === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/omaha.svg') }}" alt="Omaha" class="img-responsive">
                    <p>Omaha</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_poker_stud === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/stud.svg') }}" alt="Stud" class="img-responsive">
                    <p>Stud</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_poker_draw === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/draw.svg') }}" alt="Draw" class="img-responsive">
                    <p>Draw</p>
                </div>
            </div>
        @endif

        {{----}}
        @if($getOperator->gt_sportsbetting_nfl === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/american-football.svg') }}" alt="NFL" class="img-responsive">
                    <p>NFL</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_sportsbetting_nba === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/basketball.svg') }}" alt="NBA" class="img-responsive">
                    <p>NBA</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_sportsbetting_mlb === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/baseball.svg') }}" alt="MLB" class="img-responsive">
                    <p>MLB</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_sportsbetting_mls === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/soccer-ball.svg') }}" alt="MLS" class="img-responsive">
                    <p>MLS</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_sportsbetting_nhl === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/hockey-puck.svg') }}" alt="NHL" class="img-responsive">
                    <p>NHL</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_sportsbetting_epl === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/football.svg') }}" alt="EPL" class="img-responsive">
                    <p>EPL</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_sportsbetting_esports === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/esports.svg') }}" alt="eSports" class="img-responsive">
                    <p>eSports</p>
                </div>
            </div>
        @endif

        {{----}}

        @if($getOperator->gt_racing_horse_racing === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/horse-racing.svg') }}" alt="Horse Racing" class="img-responsive">
                    <p>Horse Racing</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_racing_greyhound_racing === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/greyhound-racing.svg') }}" alt="Greyhound Racing" class="img-responsive">
                    <p>Greyhound Racing</p>
                </div>
            </div>
        @endif {{----}}

    @elseif($getOperator->region->id === 3){{----}}
    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_poker_texas_hold_em === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_poker_texas_hold_em === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/texas-hold-em.svg') }}" alt="Texas Hold&#039;em" class="img-responsive">
            <p>Texas Hold&#039;em</p>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_poker_omaha === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_poker_omaha === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/omaha.svg') }}" alt="Omaha" class="img-responsive">
            <p>Omaha</p>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_poker_stud === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_poker_stud === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/stud.svg') }}" alt="Stud" class="img-responsive">
            <p>Stud</p>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_poker_draw === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_poker_draw === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/draw.svg') }}" alt="Draw" class="img-responsive">
            <p>Draw</p>
        </div>
    </div>

    {{----}}

    @if($getOperator->gt_casino_slots === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/slot-machine.svg') }}" alt="Slots" class="img-responsive">
                <p>Slots</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_blackjack === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/blackjack.svg') }}" alt="Blackjack" class="img-responsive">
                <p>Blackjack</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_roulette === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/roulette-table.svg') }}" alt="Roulette" class="img-responsive">
                <p>Roulette</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_live_games === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/live-games.svg') }}" alt="Live Games" class="img-responsive">
                <p>Live Games</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_video_poker === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/poker.svg') }}" alt="Video Poker" class="img-responsive">
                <p>Video Poker</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_baccarat === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/baccarat.svg') }}" alt="Baccarat" class="img-responsive">
                <p>Baccarat</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_bingo === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/bingo.svg') }}" alt="Bingo" class="img-responsive">
                <p>Bingo</p>
            </div>
        </div>
    @endif

    {{----}}

    @if($getOperator->gt_sportsbetting_nfl === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/american-football.svg') }}" alt="NFL" class="img-responsive">
                <p>NFL</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_sportsbetting_nba === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/basketball.svg') }}" alt="NBA" class="img-responsive">
                <p>NBA</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_sportsbetting_mlb === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/baseball.svg') }}" alt="MLB" class="img-responsive">
                <p>MLB</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_sportsbetting_mls === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/soccer-ball.svg') }}" alt="MLS" class="img-responsive">
                <p>MLS</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_sportsbetting_nhl === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/hockey-puck.svg') }}" alt="NHL" class="img-responsive">
                <p>NHL</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_sportsbetting_epl === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/football.svg') }}" alt="EPL" class="img-responsive">
                <p>EPL</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_sportsbetting_esports === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/esports.svg') }}" alt="eSports" class="img-responsive">
                <p>eSports</p>
            </div>
        </div>
    @endif

    {{----}}

    @if($getOperator->gt_racing_horse_racing === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/horse-racing.svg') }}" alt="Horse Racing" class="img-responsive">
                <p>Horse Racing</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_racing_greyhound_racing === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/greyhound-racing.svg') }}" alt="Greyhound Racing" class="img-responsive">
                <p>Greyhound Racing</p>
            </div>
        </div>
    @endif {{----}}

    @elseif($getOperator->region->id === 10){{----}}
    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_poker_texas_hold_em === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_poker_texas_hold_em === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/texas-hold-em.svg') }}" alt="Texas Hold&#039;em" class="img-responsive">
            <p>Texas Hold&#039;em</p>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_poker_omaha === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_poker_omaha === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/omaha.svg') }}" alt="Omaha" class="img-responsive">
            <p>Omaha</p>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_poker_stud === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_poker_stud === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/stud.svg') }}" alt="Stud" class="img-responsive">
            <p>Stud</p>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_poker_draw === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_poker_draw === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/draw.svg') }}" alt="Draw" class="img-responsive">
            <p>Draw</p>
        </div>
    </div>

    {{----}}

    @if($getOperator->gt_casino_slots === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/slot-machine.svg') }}" alt="Slots" class="img-responsive">
                <p>Slots</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_blackjack === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/blackjack.svg') }}" alt="Blackjack" class="img-responsive">
                <p>Blackjack</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_roulette === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/roulette-table.svg') }}" alt="Roulette" class="img-responsive">
                <p>Roulette</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_live_games === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/live-games.svg') }}" alt="Live Games" class="img-responsive">
                <p>Live Games</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_video_poker === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/poker.svg') }}" alt="Video Poker" class="img-responsive">
                <p>Video Poker</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_baccarat === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/baccarat.svg') }}" alt="Baccarat" class="img-responsive">
                <p>Baccarat</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_bingo === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/bingo.svg') }}" alt="Bingo" class="img-responsive">
                <p>Bingo</p>
            </div>
        </div>
    @endif

    {{----}}

    @if($getOperator->gt_sportsbetting_nfl === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/american-football.svg') }}" alt="NFL" class="img-responsive">
                <p>NFL</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_sportsbetting_nba === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/basketball.svg') }}" alt="NBA" class="img-responsive">
                <p>NBA</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_sportsbetting_mlb === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/baseball.svg') }}" alt="MLB" class="img-responsive">
                <p>MLB</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_sportsbetting_mls === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/soccer-ball.svg') }}" alt="MLS" class="img-responsive">
                <p>MLS</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_sportsbetting_nhl === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/hockey-puck.svg') }}" alt="NHL" class="img-responsive">
                <p>NHL</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_sportsbetting_epl === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/football.svg') }}" alt="EPL" class="img-responsive">
                <p>EPL</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_sportsbetting_esports === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/esports.svg') }}" alt="eSports" class="img-responsive">
                <p>eSports</p>
            </div>
        </div>
    @endif

    {{----}}

    @if($getOperator->gt_racing_horse_racing === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/horse-racing.svg') }}" alt="Horse Racing" class="img-responsive">
                <p>Horse Racing</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_racing_greyhound_racing === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/greyhound-racing.svg') }}" alt="Greyhound Racing" class="img-responsive">
                <p>Greyhound Racing</p>
            </div>
        </div>
    @endif {{----}}

    @elseif($getOperator->region->id === 11){{----}}
    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_poker_texas_hold_em === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_poker_texas_hold_em === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/texas-hold-em.svg') }}" alt="Texas Hold&#039;em" class="img-responsive">
            <p>Texas Hold&#039;em</p>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_poker_omaha === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_poker_omaha === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/omaha.svg') }}" alt="Omaha" class="img-responsive">
            <p>Omaha</p>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_poker_stud === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_poker_stud === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/stud.svg') }}" alt="Stud" class="img-responsive">
            <p>Stud</p>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_poker_draw === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_poker_draw === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/draw.svg') }}" alt="Draw" class="img-responsive">
            <p>Draw</p>
        </div>
    </div>

    {{----}}

    @if($getOperator->gt_casino_slots === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/slot-machine.svg') }}" alt="Slots" class="img-responsive">
                <p>Slots</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_blackjack === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/blackjack.svg') }}" alt="Blackjack" class="img-responsive">
                <p>Blackjack</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_roulette === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/roulette-table.svg') }}" alt="Roulette" class="img-responsive">
                <p>Roulette</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_live_games === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/live-games.svg') }}" alt="Live Games" class="img-responsive">
                <p>Live Games</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_video_poker === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/poker.svg') }}" alt="Video Poker" class="img-responsive">
                <p>Video Poker</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_baccarat === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/baccarat.svg') }}" alt="Baccarat" class="img-responsive">
                <p>Baccarat</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_bingo === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/bingo.svg') }}" alt="Bingo" class="img-responsive">
                <p>Bingo</p>
            </div>
        </div>
    @endif

    {{----}}

    @if($getOperator->gt_sportsbetting_nfl === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/american-football.svg') }}" alt="NFL" class="img-responsive">
                <p>NFL</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_sportsbetting_nba === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/basketball.svg') }}" alt="NBA" class="img-responsive">
                <p>NBA</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_sportsbetting_mlb === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/baseball.svg') }}" alt="MLB" class="img-responsive">
                <p>MLB</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_sportsbetting_mls === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/soccer-ball.svg') }}" alt="MLS" class="img-responsive">
                <p>MLS</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_sportsbetting_nhl === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/hockey-puck.svg') }}" alt="NHL" class="img-responsive">
                <p>NHL</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_sportsbetting_epl === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/football.svg') }}" alt="EPL" class="img-responsive">
                <p>EPL</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_sportsbetting_esports === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/esports.svg') }}" alt="eSports" class="img-responsive">
                <p>eSports</p>
            </div>
        </div>
    @endif

    {{----}}

    @if($getOperator->gt_racing_horse_racing === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/horse-racing.svg') }}" alt="Horse Racing" class="img-responsive">
                <p>Horse Racing</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_racing_greyhound_racing === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/greyhound-racing.svg') }}" alt="Greyhound Racing" class="img-responsive">
                <p>Greyhound Racing</p>
            </div>
        </div>
    @endif {{----}}

    @elseif($getOperator->region->id === 12){{----}}
    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_poker_texas_hold_em === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_poker_texas_hold_em === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/texas-hold-em.svg') }}" alt="Texas Hold&#039;em" class="img-responsive">
            <p>Texas Hold&#039;em</p>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_poker_omaha === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_poker_omaha === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/omaha.svg') }}" alt="Omaha" class="img-responsive">
            <p>Omaha</p>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_poker_stud === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_poker_stud === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/stud.svg') }}" alt="Stud" class="img-responsive">
            <p>Stud</p>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_poker_draw === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_poker_draw === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/draw.svg') }}" alt="Draw" class="img-responsive">
            <p>Draw</p>
        </div>
    </div>

    {{----}}

    @if($getOperator->gt_casino_slots === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/slot-machine.svg') }}" alt="Slots" class="img-responsive">
                <p>Slots</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_blackjack === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/blackjack.svg') }}" alt="Blackjack" class="img-responsive">
                <p>Blackjack</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_roulette === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/roulette-table.svg') }}" alt="Roulette" class="img-responsive">
                <p>Roulette</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_live_games === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/live-games.svg') }}" alt="Live Games" class="img-responsive">
                <p>Live Games</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_video_poker === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/poker.svg') }}" alt="Video Poker" class="img-responsive">
                <p>Video Poker</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_baccarat === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/baccarat.svg') }}" alt="Baccarat" class="img-responsive">
                <p>Baccarat</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_bingo === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/bingo.svg') }}" alt="Bingo" class="img-responsive">
                <p>Bingo</p>
            </div>
        </div>
    @endif

    {{----}}

    @if($getOperator->gt_sportsbetting_nfl === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/american-football.svg') }}" alt="NFL" class="img-responsive">
                <p>NFL</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_sportsbetting_nba === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/basketball.svg') }}" alt="NBA" class="img-responsive">
                <p>NBA</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_sportsbetting_mlb === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/baseball.svg') }}" alt="MLB" class="img-responsive">
                <p>MLB</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_sportsbetting_mls === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/soccer-ball.svg') }}" alt="MLS" class="img-responsive">
                <p>MLS</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_sportsbetting_nhl === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/hockey-puck.svg') }}" alt="NHL" class="img-responsive">
                <p>NHL</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_sportsbetting_epl === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/football.svg') }}" alt="EPL" class="img-responsive">
                <p>EPL</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_sportsbetting_esports === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/esports.svg') }}" alt="eSports" class="img-responsive">
                <p>eSports</p>
            </div>
        </div>
    @endif

    {{----}}

    @if($getOperator->gt_racing_horse_racing === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/horse-racing.svg') }}" alt="Horse Racing" class="img-responsive">
                <p>Horse Racing</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_racing_greyhound_racing === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/greyhound-racing.svg') }}" alt="Greyhound Racing" class="img-responsive">
                <p>Greyhound Racing</p>
            </div>
        </div>
    @endif {{----}}

    @elseif($getOperator->region->id === 4){{----}}
    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_sportsbetting_nfl === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_sportsbetting_nfl === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/american-football.svg') }}" alt="NFL" class="img-responsive">
            <p>NFL</p>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_sportsbetting_nba === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_sportsbetting_nba === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/basketball.svg') }}" alt="NBA" class="img-responsive">
            <p>NBA</p>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_sportsbetting_mlb === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_sportsbetting_mlb === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/baseball.svg') }}" alt="MLB" class="img-responsive">
            <p>MLB</p>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_sportsbetting_mls === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_sportsbetting_mls === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/soccer-ball.svg') }}" alt="MLS" class="img-responsive">
            <p>MLS</p>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_sportsbetting_nhl === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_sportsbetting_nhl === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/hockey-puck.svg') }}" alt="NHL" class="img-responsive">
            <p>NHL</p>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_sportsbetting_epl === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_sportsbetting_epl === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/football.svg') }}" alt="EPL" class="img-responsive">
            <p>EPL</p>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_sportsbetting_esports === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_sportsbetting_esports === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/esports.svg') }}" alt="eSports" class="img-responsive">
            <p>eSports</p>
        </div>
    </div>

    {{----}}

    @if($getOperator->gt_casino_slots === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/slot-machine.svg') }}" alt="Slots" class="img-responsive">
                <p>Slots</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_blackjack === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/blackjack.svg') }}" alt="Blackjack" class="img-responsive">
                <p>Blackjack</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_roulette === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/roulette-table.svg') }}" alt="Roulette" class="img-responsive">
                <p>Roulette</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_live_games === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/live-games.svg') }}" alt="Live Games" class="img-responsive">
                <p>Live Games</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_video_poker === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/poker.svg') }}" alt="Video Poker" class="img-responsive">
                <p>Video Poker</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_baccarat === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/baccarat.svg') }}" alt="Baccarat" class="img-responsive">
                <p>Baccarat</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_bingo === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/bingo.svg') }}" alt="Bingo" class="img-responsive">
                <p>Bingo</p>
            </div>
        </div>
    @endif

    {{----}}

    @if($getOperator->gt_poker_texas_hold_em === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/texas-hold-em.svg') }}" alt="Texas Hold&#039;em" class="img-responsive">
                <p>Texas Hold&#039;em</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_poker_omaha === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/omaha.svg') }}" alt="Omaha" class="img-responsive">
                <p>Omaha</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_poker_stud === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/stud.svg') }}" alt="Stud" class="img-responsive">
                <p>Stud</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_poker_draw === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/draw.svg') }}" alt="Draw" class="img-responsive">
                <p>Draw</p>
            </div>
        </div>
    @endif

    {{----}}

    @if($getOperator->gt_racing_horse_racing === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/horse-racing.svg') }}" alt="Horse Racing" class="img-responsive">
                <p>Horse Racing</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_racing_greyhound_racing === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/greyhound-racing.svg') }}" alt="Greyhound Racing" class="img-responsive">
                <p>Greyhound Racing</p>
            </div>
        </div>
    @endif {{----}}

    @elseif($getOperator->region->id === 6){{----}}
    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_sportsbetting_nfl === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_sportsbetting_nfl === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/american-football.svg') }}" alt="NFL" class="img-responsive">
            <p>NFL</p>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_sportsbetting_nba === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_sportsbetting_nba === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/basketball.svg') }}" alt="NBA" class="img-responsive">
            <p>NBA</p>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_sportsbetting_mlb === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_sportsbetting_mlb === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/baseball.svg') }}" alt="MLB" class="img-responsive">
            <p>MLB</p>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_sportsbetting_mls === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_sportsbetting_mls === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/soccer-ball.svg') }}" alt="MLS" class="img-responsive">
            <p>MLS</p>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_sportsbetting_nhl === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_sportsbetting_nhl === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/hockey-puck.svg') }}" alt="NHL" class="img-responsive">
            <p>NHL</p>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_sportsbetting_epl === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_sportsbetting_epl === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/football.svg') }}" alt="EPL" class="img-responsive">
            <p>EPL</p>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_sportsbetting_esports === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_sportsbetting_esports === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/esports.svg') }}" alt="eSports" class="img-responsive">
            <p>eSports</p>
        </div>
    </div>

    {{----}}

    @if($getOperator->gt_casino_slots === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/slot-machine.svg') }}" alt="Slots" class="img-responsive">
                <p>Slots</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_blackjack === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/blackjack.svg') }}" alt="Blackjack" class="img-responsive">
                <p>Blackjack</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_roulette === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/roulette-table.svg') }}" alt="Roulette" class="img-responsive">
                <p>Roulette</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_live_games === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/live-games.svg') }}" alt="Live Games" class="img-responsive">
                <p>Live Games</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_video_poker === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/poker.svg') }}" alt="Video Poker" class="img-responsive">
                <p>Video Poker</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_baccarat === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/baccarat.svg') }}" alt="Baccarat" class="img-responsive">
                <p>Baccarat</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_bingo === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/bingo.svg') }}" alt="Bingo" class="img-responsive">
                <p>Bingo</p>
            </div>
        </div>
    @endif

    {{----}}

    @if($getOperator->gt_poker_texas_hold_em === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/texas-hold-em.svg') }}" alt="Texas Hold&#039;em" class="img-responsive">
                <p>Texas Hold&#039;em</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_poker_omaha === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/omaha.svg') }}" alt="Omaha" class="img-responsive">
                <p>Omaha</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_poker_stud === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/stud.svg') }}" alt="Stud" class="img-responsive">
                <p>Stud</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_poker_draw === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/draw.svg') }}" alt="Draw" class="img-responsive">
                <p>Draw</p>
            </div>
        </div>
    @endif

    {{----}}

    @if($getOperator->gt_racing_horse_racing === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/horse-racing.svg') }}" alt="Horse Racing" class="img-responsive">
                <p>Horse Racing</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_racing_greyhound_racing === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/greyhound-racing.svg') }}" alt="Greyhound Racing" class="img-responsive">
                <p>Greyhound Racing</p>
            </div>
        </div>
    @endif {{----}}

    @elseif($getOperator->region->id === 8){{----}}
    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_sportsbetting_nfl === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_sportsbetting_nfl === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/american-football.svg') }}" alt="NFL" class="img-responsive">
            <p>NFL</p>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_sportsbetting_nba === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_sportsbetting_nba === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/basketball.svg') }}" alt="NBA" class="img-responsive">
            <p>NBA</p>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_sportsbetting_mlb === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_sportsbetting_mlb === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/baseball.svg') }}" alt="MLB" class="img-responsive">
            <p>MLB</p>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_sportsbetting_mls === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_sportsbetting_mls === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/soccer-ball.svg') }}" alt="MLS" class="img-responsive">
            <p>MLS</p>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_sportsbetting_nhl === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_sportsbetting_nhl === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/hockey-puck.svg') }}" alt="NHL" class="img-responsive">
            <p>NHL</p>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_sportsbetting_epl === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_sportsbetting_epl === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/football.svg') }}" alt="EPL" class="img-responsive">
            <p>EPL</p>
        </div>
    </div>

    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
        <div class="oc-available-game-type-box">
            @if($getOperator->gt_sportsbetting_esports === 1)
                <span class="availability available"><i class="fa fa-check-circle"></i></span>
            @elseif($getOperator->gt_sportsbetting_esports === 0)
                <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
            @endif

            <img src="{{ asset('img/icons/esports.svg') }}" alt="eSports" class="img-responsive">
            <p>eSports</p>
        </div>
    </div>

    {{----}}

    @if($getOperator->gt_casino_slots === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/slot-machine.svg') }}" alt="Slots" class="img-responsive">
                <p>Slots</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_blackjack === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/blackjack.svg') }}" alt="Blackjack" class="img-responsive">
                <p>Blackjack</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_roulette === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/roulette-table.svg') }}" alt="Roulette" class="img-responsive">
                <p>Roulette</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_live_games === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/live-games.svg') }}" alt="Live Games" class="img-responsive">
                <p>Live Games</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_video_poker === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/poker.svg') }}" alt="Video Poker" class="img-responsive">
                <p>Video Poker</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_baccarat === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/baccarat.svg') }}" alt="Baccarat" class="img-responsive">
                <p>Baccarat</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_casino_bingo === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/bingo.svg') }}" alt="Bingo" class="img-responsive">
                <p>Bingo</p>
            </div>
        </div>
    @endif

    {{----}}

    @if($getOperator->gt_poker_texas_hold_em === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/texas-hold-em.svg') }}" alt="Texas Hold&#039;em" class="img-responsive">
                <p>Texas Hold&#039;em</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_poker_omaha === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/omaha.svg') }}" alt="Omaha" class="img-responsive">
                <p>Omaha</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_poker_stud === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/stud.svg') }}" alt="Stud" class="img-responsive">
                <p>Stud</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_poker_draw === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/draw.svg') }}" alt="Draw" class="img-responsive">
                <p>Draw</p>
            </div>
        </div>
    @endif

    {{----}}

    @if($getOperator->gt_racing_horse_racing === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/horse-racing.svg') }}" alt="Horse Racing" class="img-responsive">
                <p>Horse Racing</p>
            </div>
        </div>
    @endif

    @if($getOperator->gt_racing_greyhound_racing === 1)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                <span class="availability available"><i class="fa fa-check-circle"></i></span>

                <img src="{{ asset('img/icons/greyhound-racing.svg') }}" alt="Greyhound Racing" class="img-responsive">
                <p>Greyhound Racing</p>
            </div>
        </div>
    @endif {{----}}

    @elseif($getOperator->region->id === 5)
        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                @if($getOperator->gt_racing_horse_racing === 1)
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>
                @elseif($getOperator->gt_racing_horse_racing === 0)
                    <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
                @endif

                <img src="{{ asset('img/icons/horse-racing.svg') }}" alt="Horse Racing" class="img-responsive">
                <p>Horse Racing</p>
            </div>
        </div>

        <div class="col-xs-6 col-sm-2 col-md-2 text-center">
            <div class="oc-available-game-type-box">
                @if($getOperator->gt_racing_greyhound_racing === 1)
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>
                @elseif($getOperator->gt_racing_greyhound_racing === 0)
                    <span class="availability not-available"><i class="fa fa-times-circle"></i></span>
                @endif

                <img src="{{ asset('img/icons/greyhound-racing.svg') }}" alt="Greyhound Racing" class="img-responsive">
                <p>Greyhound Racing</p>
            </div>
        </div>

        {{----}}

        @if($getOperator->gt_casino_slots === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/slot-machine.svg') }}" alt="Slots" class="img-responsive">
                    <p>Slots</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_casino_blackjack === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/blackjack.svg') }}" alt="Blackjack" class="img-responsive">
                    <p>Blackjack</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_casino_roulette === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/roulette-table.svg') }}" alt="Roulette" class="img-responsive">
                    <p>Roulette</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_casino_live_games === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/live-games.svg') }}" alt="Live Games" class="img-responsive">
                    <p>Live Games</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_casino_video_poker === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/poker.svg') }}" alt="Video Poker" class="img-responsive">
                    <p>Video Poker</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_casino_baccarat === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/baccarat.svg') }}" alt="Baccarat" class="img-responsive">
                    <p>Baccarat</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_casino_bingo === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/bingo.svg') }}" alt="Bingo" class="img-responsive">
                    <p>Bingo</p>
                </div>
            </div>
        @endif

        {{----}}

        @if($getOperator->gt_poker_texas_hold_em === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/texas-hold-em.svg') }}" alt="Texas Hold&#039;em" class="img-responsive">
                    <p>Texas Hold&#039;em</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_poker_omaha === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/omaha.svg') }}" alt="Omaha" class="img-responsive">
                    <p>Omaha</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_poker_stud === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/stud.svg') }}" alt="Stud" class="img-responsive">
                    <p>Stud</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_poker_draw === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/draw.svg') }}" alt="Draw" class="img-responsive">
                    <p>Draw</p>
                </div>
            </div>
        @endif

        {{----}}

        @if($getOperator->gt_sportsbetting_nfl === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/american-football.svg') }}" alt="NFL" class="img-responsive">
                    <p>NFL</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_sportsbetting_nba === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/basketball.svg') }}" alt="NBA" class="img-responsive">
                    <p>NBA</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_sportsbetting_mlb === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/baseball.svg') }}" alt="MLB" class="img-responsive">
                    <p>MLB</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_sportsbetting_mls === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/soccer-ball.svg') }}" alt="MLS" class="img-responsive">
                    <p>MLS</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_sportsbetting_nhl === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/hockey-puck.svg') }}" alt="NHL" class="img-responsive">
                    <p>NHL</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_sportsbetting_epl === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/football.svg') }}" alt="EPL" class="img-responsive">
                    <p>EPL</p>
                </div>
            </div>
        @endif

        @if($getOperator->gt_sportsbetting_esports === 1)
            <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                <div class="oc-available-game-type-box">
                    <span class="availability available"><i class="fa fa-check-circle"></i></span>

                    <img src="{{ asset('img/icons/esports.svg') }}" alt="eSports" class="img-responsive">
                    <p>eSports</p>
                </div>
            </div>
        @endif
    @endif
</div>