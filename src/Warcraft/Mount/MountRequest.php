<?php

namespace Pwnraid\Bnet\Warcraft\Mount;

use Pwnraid\Bnet\Core\AbstractRequest;
use Pwnraid\Bnet\Warcraft\Mount\MountEntity;

class MountRequest extends AbstractRequest
{
	public function all()
	{
		$data = $this->client->get('mount/');

		if($data === null)
		{
			return null;
		}

		$mountsArray = [];

		foreach ($data['mounts'] as $mounts) {
			$mountsArray[] = new MountEntity($mounts, $this->client);
		}

		return $mountsArray;
	
	}
}