<div class="side">
				<h3>日志排行榜</h3>
				<ul>
                    @foreach($top10 as $t)
					<li><a target="_blank" href="{{ route('blog.content', ['id'=>$t->id]) }}">{{ $t->title }}</a><p>{{ $t->created_at }}</p></li>
                    @endforeach
				</ul>
			</div>
