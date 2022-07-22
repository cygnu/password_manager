import { useMutation, useQuery, useQueryClient } from 'react-query'
import { toast } from 'react-toastify'
import * as api from '../api/ContentAPI'

const useContents = () => {
  return useQuery('contents', () => api.getContents())
}

const useCreateContent = () => {
  const queryClient = useQueryClient()

  return useMutation(api.createContent, {
    onSuccess: () => {
      queryClient.invalidateQueries('contents')
      toast.success('Successfully registered!')
    },
    onError: () => {
      toast.error('Registration failed.')
    }
  })
}

export { useContents, useCreateContent }
