<x-layout.app>
    <div class="text-4xl">
        <x-element.logo :style="'primary'"/>
    </div>
    <div class="text-4xl">
        <x-element.logo :style="'secondary'"/>
    </div>
    <div class="text-4xl">
        <x-element.logo :style="'accent'"/>
    </div>
    <div class="text-4xl">
        <x-element.logo/>
    </div>
    <div class="text-4xl">
        <x-element.logo :style="'inverted'"/>
    </div>
    <article class="format">
        <h1>Prova</h1>
        <h2>Prova</h2>
        <h3>Prova</h3>
        <h4>Prova</h4>
        <h5>Prova</h5>
        <h6>Prova</h6>
        <p>
            Lorem ipsum dolor sit amet, <a href="#" target="_self">consetetur</a> sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. Nam liber
        </p>
        <x-element.blockquote :author="'Mario Rossi'">
            The blockquote element is ideal for showcasing well-known quotes within content. It's commonly used for
            testimonials, reviews, and notable quotes in articles.
        </x-element.blockquote>
        <p>
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata
        </p>
        <ul>
            <li>
                Prova di testo
            </li>
            <li>
                Prova di testo
            </li>
            <ul>
                <li>
                    Prova di testo
                </li>
            </ul>
            <li>
                Prova di testo
            </li>
        </ul>
        <x-element.image :src="'https://images.pexels.com/photos/1261728/pexels-photo-1261728.jpeg'" :alt="null" :credits="'Google.com'"/>
        <p>
            <strong>Lorem ipsum</strong> dolor sit amet, <sub>consetetur</sub> sadipscing <sup>elitr</sup>, sed diam <code>nonumy</code> eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata
        </p>
    </article>
    <article class="format format-serif">
        <h1>Prova</h1>
        <h2>Prova</h2>
        <h3>Prova</h3>
        <h4>Prova</h4>
        <h5>Prova</h5>
        <h6>Prova</h6>
        <p>
            Lorem ipsum dolor sit amet, <a href="#" target="_self">consetetur</a> sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna <span class="text-mark">aliquyam erat, sed diam voluptua</span>. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. Nam liber
        </p>
        <x-element.blockquote :author="'Mario Rossi'">
            The blockquote element is ideal for showcasing well-known quotes within content. It's commonly used for
            testimonials, reviews, and notable quotes in articles.
        </x-element.blockquote>
        <p>
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata
        </p>
        <ol>
            <li>
                Prova di testo
            </li>
            <li>
                Prova di testo
            </li>
            <ol>
                <li>
                    Prova di testo
                </li>
            </ol>
            <li>
                Prova di testo
            </li>
        </ol>
        <p>
            <strong>Lorem ipsum</strong> dolor sit amet, <sub>consetetur</sub> sadipscing <sup>elitr</sup>, sed diam <code>nonumy</code> eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata
        </p>
    </article>
</x-layout.app>
