dexer (index of the boolean Series and of the indexed object do not match).r�   )rq   r(   r�   r�  r�  r   r[  r�   r&   �astyperd   rp  r"   r�   r�  r   �pd_arrayr1   )r�   r~   �resultr�   s       rG   r"  r"  H
  s�   � �4 �F��#�y�!�#�)�)�*:�*:�5�*A��,�,�.�.�u�5����=��4�� � ���W�%�� �&�,�,��7��=�=��&�.�.�.��s�����F�$�/���6�"� �&��-���u�f�-�-rI   c                �r   � t        | t        �      r$| d   } t        | t        �      rt        d�      �| dfS | dfS )z�
    Reverse convert a missing indexer, which is a dict
    return the scalar indexer and a boolean indicating if we converted
    r~   z.cannot use a single bool to index into setitemTF)rq   rw  rd   rx   )r�   s    rG   r�  r�  |
  sA   � �
 �'�4� ��%�.���g�t�$��K�L�L���}���E�>�rI   c                �J   ��� �fd��t        �fd�t        | �      D �       �      S )zK
    Create a filtered indexer that doesn't have any missing indexers.
    c                �V   �� t        |t        �      r�|    j                  |d   �      S |S )Nr~   )rq   rw  ry   )�_i�_idxr�   s     �rG   r�  z7convert_from_missing_indexer_tuple.<locals>.get_indexer�
 