<div class="plyr__controls">
	<button class="plyr__controls__item plyr__control" type="button" data-plyr="play" aria-label="Play">
		<svg class="icon--pressed" role="presentation" focusable="false"><use xlink:href="#plyr-pause"></use></svg>
		<svg class="icon--not-pressed" role="presentation" focusable="false"><use xlink:href="#plyr-play"></use></svg>
		<span class="label--pressed plyr__sr-only">Pause</span><span class="label--not-pressed plyr__sr-only">Play</span>
	</button>
	<div class="plyr__controls__item plyr__progress__container">
		<div class="plyr__progress">
			<input data-plyr="seek" type="range" min="0" max="100" step="0.01" value="0" autocomplete="off" role="slider" aria-label="Seek" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" id="plyr-seek-4514" style="--value:0%;" seek-value="1.7521793815327231">
			<progress class="plyr__progress__buffer" min="0" max="100" value="0" role="progressbar" aria-hidden="true">% buffered</progress>
			<span class="plyr__tooltip" style="left: 3.69519%;">00:05</span>
		</div>
	</div>
	<div class="plyr__controls__item plyr__time--current plyr__time" aria-label="Current time">-02:30</div>
	<div class="plyr__controls__item plyr__volume">
		<button type="button" class="plyr__control" data-plyr="mute">
			<svg class="icon--pressed" role="presentation" focusable="false"><use xlink:href="#plyr-muted"></use></svg>
			<svg class="icon--not-pressed" role="presentation" focusable="false"><use xlink:href="#plyr-volume"></use></svg>
			<span class="label--pressed plyr__sr-only">Unmute</span>
			<span class="label--not-pressed plyr__sr-only">Mute</span>
		</button>
		<input data-plyr="volume" type="range" min="0" max="1" step="0.05" value="1" autocomplete="off" role="slider" aria-label="Volume" aria-valuemin="0" aria-valuemax="100" aria-valuenow="100" id="plyr-volume-4514" aria-valuetext="100.0%" style="--value:100%;">
	</div>
	<button class="plyr__controls__item plyr__control" type="button" data-plyr="captions"><svg class="icon--pressed" role="presentation" focusable="false"><use xlink:href="#plyr-captions-on"></use></svg><svg class="icon--not-pressed" role="presentation" focusable="false"><use xlink:href="#plyr-captions-off"></use></svg><span class="label--pressed plyr__sr-only">Disable captions</span><span class="label--not-pressed plyr__sr-only">Enable captions</span></button>
	<div class="plyr__controls__item plyr__menu">
		<button aria-haspopup="true" aria-controls="plyr-settings-4514" aria-expanded="false" type="button" class="plyr__control" data-plyr="settings"><svg role="presentation" focusable="false"><use xlink:href="#plyr-settings"></use></svg><span class="plyr__sr-only">Settings</span></button>
		<div class="plyr__menu__container" id="plyr-settings-4514" hidden="">
			<div>
				<div id="plyr-settings-4514-home">
					<div role="menu">
						<button data-plyr="settings" type="button" class="plyr__control plyr__control--forward" role="menuitem" aria-haspopup="true">
							<span>Captions<span class="plyr__menu__value">Disabled</span></span>
						</button>
						<button data-plyr="settings" type="button" class="plyr__control plyr__control--forward" role="menuitem" aria-haspopup="true" hidden="">
							<span>Quality<span class="plyr__menu__value">undefined</span></span>
						</button>
						<button data-plyr="settings" type="button" class="plyr__control plyr__control--forward" role="menuitem" aria-haspopup="true">
							<span>Speed<span class="plyr__menu__value">Normal</span></span>
						</button>
					</div>
				</div>
				<div id="plyr-settings-4514-captions" hidden="">
					<button type="button" class="plyr__control plyr__control--back">
						<span aria-hidden="true">Captions</span>
						<span class="plyr__sr-only">Go back to previous menu</span>
					</button>
					<div role="menu">
						<button data-plyr="language" type="button" role="menuitemradio" class="plyr__control" aria-checked="true" value="-1">
							<span>Disabled</span>
						</button>
						<button data-plyr="language" type="button" role="menuitemradio" class="plyr__control" aria-checked="false" value="0">
							<span>English<span class="plyr__menu__value"><span class="plyr__badge">EN</span></span></span>
						</button>
						<button data-plyr="language" type="button" role="menuitemradio" class="plyr__control" aria-checked="false" value="1">
							<span>Français<span class="plyr__menu__value">
								<span class="plyr__badge">FR</span></span></span>
							</button>
						</div>
					</div>
					<div id="plyr-settings-4514-quality" hidden="">
						<button type="button" class="plyr__control plyr__control--back">
							<span aria-hidden="true">Quality</span>
							<span class="plyr__sr-only">Go back to previous menu</span>
						</button>
						<div role="menu">
							
						</div>
					</div>
					<div id="plyr-settings-4514-speed" hidden="">
						<button type="button" class="plyr__control plyr__control--back">
							<span aria-hidden="true">Speed</span><span class="plyr__sr-only">Go back to previous menu</span>
						</button>
						<div role="menu">
							<button data-plyr="speed" type="button" role="menuitemradio" class="plyr__control" aria-checked="false" value="0.5">
								<span>0.5×</span>
							</button>
							<button data-plyr="speed" type="button" role="menuitemradio" class="plyr__control" aria-checked="false" value="0.75"><span>0.75×</span>
							</button>
							<button data-plyr="speed" type="button" role="menuitemradio" class="plyr__control" aria-checked="true" value="1"><span>Normal</span></button>
							<button data-plyr="speed" type="button" role="menuitemradio" class="plyr__control" aria-checked="false" value="1.25"><span>1.25×</span></button>
							<button data-plyr="speed" type="button" role="menuitemradio" class="plyr__control" aria-checked="false" value="1.5"><span>1.5×</span></button>
							<button data-plyr="speed" type="button" role="menuitemradio" class="plyr__control" aria-checked="false" value="1.75"><span>1.75×</span></button>
							<button data-plyr="speed" type="button" role="menuitemradio" class="plyr__control" aria-checked="false" value="2"><span>2×</span></button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<button class="plyr__controls__item plyr__control" type="button" data-plyr="pip">
			<svg role="presentation" focusable="false">
			<use xlink:href="#plyr-pip"></use>
			</svg>
			<span class="plyr__sr-only">PIP</span>
		</button>
		<button class="plyr__controls__item plyr__control" type="button" data-plyr="fullscreen">
			<svg class="icon--pressed" role="presentation" focusable="false">
			<use xlink:href="#plyr-exit-fullscreen"></use>
		</svg>
		<svg class="icon--not-pressed" role="presentation" focusable="false">
			<use xlink:href="#plyr-enter-fullscreen">
				
			</use>
		</svg>
		<span class="label--pressed plyr__sr-only">Exit fullscreen</span>
		<span class="label--not-pressed plyr__sr-only">Enter fullscreen</span>
	</button>
</div>