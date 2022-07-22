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

const useContent = (content_id: number) => {
  return useQuery(['content', content_id], () => api.getContent(content_id))
}

const useUpdateContent = () => {
  const queryClient = useQueryClient()

  return useMutation(api.updateContent, {
    onSuccess: () => {
      queryClient.invalidateQueries('contents')
      toast.success('Successfully updated!')
    },
    onError: () => {
      toast.error('Update failed.')
    }
  })
}

const useDeleteContent = () => {
  const queryClient = useQueryClient()

  return useMutation(api.deleteContent, {
    onSuccess: () => {
      queryClient.invalidateQueries('contents')
      toast.success('Successfully deleted!')
    },
    onError: () => {
      toast.error('Deletion failed.')
    }
  })
}

export { useContents, useCreateContent, useContent, useUpdateContent, useDeleteContent }
