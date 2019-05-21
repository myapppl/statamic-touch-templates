<div class="card flush">
    <div class="head">
        <h1>Touch Templates</h1>
        <a href="{{ route('touch-templates.touch-files') }}" class="btn icon icon-cw" title="touch files"></a>
    </div>
    <div class="card-body pad-16">
        <table class="dossier">
            <tbody>
                @foreach ($files as $file)
                    <tr>
                        <td>{{ $file->getPathname() }}</td>
                        <td>{{ \date('d.m.Y H:i', \filemtime($file->getPathname())) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
